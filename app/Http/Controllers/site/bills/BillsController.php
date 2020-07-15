<?php

namespace App\Http\Controllers\site\bills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bills;
use App\Address;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $month = \Carbon\Carbon::now()->month;

        $data = Address::where('status', '1')
                ->orderBy('serial', 'asc')->get();
        $count = $data->count();

        return view('site/bills/insert/index', [
            'data' => $data,
            'month' => $month,
            'count' => $count,
        ]);
    }

    public function store(Request $request)
    {
        $address_id = $request->get('address_id');
        $latest = $request->get('latest');
        $note = $request->get('note');
        $count = count(collect($address_id));
        
        for($i=0; $i<$count; $i++){
            if($latest[$i] != null){
                $Bills = new Bills();
                $Bills->address_id = $address_id[$i];
                $Bills->latest = $latest[$i];
                $Bills->note = $note[$i];
                $Bills->save();
            }
        }

        return back()->with('Success', 'เพิ่มข้อมูลเรียบร้อย');
    }

    public function showEdit(){
        $month = \Carbon\Carbon::now()->month;
        $year = \Carbon\Carbon::now()->year;
       
        return view('site/bills/edit/index', [
            'month' => $month,
            'year' => $year,
        ]);
    }

    public function dataEdit(Request $request){
        
        $month = $request->get('month');
        $year = $request->get('year');

        $year_get = $year+543;
        $month_get = Bills::MonthThai((int)$month);

        $date = $year."-".$month;
        $data = Bills::ShowBillsEdit($date)->get();
        $count_search = count($data);
       
        return view('site/bills/edit/index', [
            'data' => $data,
            'date_search' => $date,
            'count_search' => $count_search,
            'date_get' => "เดือน ".$month_get." ".$year_get
        ]);
    }

    public function update(Request $request){
        
        //dd($request->all());
        $bills_id = $request->get('bills_id');
        $latest = $request->get('latest');
        $note = $request->get('note');
        $status = $request->get('status');
        $count = count(collect($bills_id));

        for($i=0; $i<$count; $i++){
            $Bills = Bills::find($bills_id[$i]);
            $Bills->latest = $latest[$i];
            $Bills->status = $status[$i];
            $Bills->note = $note[$i];
            $Bills->save();
        }

        return back()->with('Success', 'แก้ไขข้อมูลเรียบร้อย');
        
    }
}
