<?php

namespace App\Http\Controllers\site\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bills;
use PDF;

class BillsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $month = \Carbon\Carbon::now()->month;
        $year = \Carbon\Carbon::now()->year;
       
        return view('site/reports/bills/index', [
            'month' => $month,
            'year' => $year,
        ]);
    }

    public function report(Request $request){
        $month = $request->get('month');
        $year = $request->get('year');

        $year_get = $year+543;
        $month_get = Bills::MonthThai((int)$month);

        $date = $year."-".$month;
        $data = Bills::ReportBills($date)->get();

        $count_search = count($data);
       
        return view('site/reports/bills/index', [
            'data' => $data,
            'date_search' => $month."/".$year_get,
            'date_Before' => $date,
            'count_search' => $count_search,
            'date_get' => "เดือน ".$month_get." ".$year_get
        ]);
    }

    public function pdf(Request $request){
        $date_search = $request->get('date_search');
        $date_Before = $request->get('date_Before');
        $date_get = $request->get('date_get');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_report_to_html($date_search,$date_Before,$date_get));
        // Paper Size
        $pdf->setPaper('A4', 'landscape');
        
        return @$pdf->stream();
    }

    function convert_report_to_html($date_search,$date_Before,$date_get)
    {
        $date_search = $date_search;
        $date_Before = $date_Before;
        $date_get = $date_get;

        $data = Bills::ReportBills($date_Before)->get();

        return view('site/reports/bills/pdf',
            [
                'data' => $data,
                'date_search' => $date_search,
                'date_Before' => $date_Before,
                'date_get' => $date_get,
            ]
        );
    }

}
