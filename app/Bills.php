<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bills extends Model
{
    protected $table = 'bills';

    protected $primaryKey = 'bills_id';

    protected $fillable = [
        'bills_id', 'address_id', 'latest', 'status', 'note',
    ];

    public function scopeShowBillsInsert($query,$data)
    {
        $address_id = $data;
        $date = date('Y-m');

        $query = DB::table('bills AS b')
        ->where('address_id', $address_id)
        ->where('created_at', 'like', $date.'%')
        ->select('*')->get();

        $count = $query->count();

        return ($count>=1) ? 1 : 0 ;
    }

    public static function ShowBeforeInsert($data)
    {
        $address_id = $data;
        $date = date('Y-m',strtotime("-1 month"));
        $m = substr($date,5,2);

        $query = DB::table('bills AS b')
        ->where('address_id', $address_id)
        ->where('created_at', 'like', $date.'%')
        ->select('latest')->get();

        $count = $query->count();

        if($count==1){
            foreach($query as $value) {
                $latest = $value->latest;
            }
        }
        
        return ($count!=1) ? "ไม่มีข้อมูลเดือน " . \App\Bills::MonthThai((int)$m) : $latest;
    }

    public function scopeShowBillsEdit($query,$data)
    {
        $date = $data;

        $query = DB::table('bills AS b')
        ->join('address AS a', 'b.address_id', '=', 'a.address_id')
        ->where('b.created_at', 'like', $date.'%')
        ->orderBy('a.serial', 'asc')
        ->select('*','b.status AS sta');

        return $query;
    }

    public static function ShowBeforeEdit($data1,$data2)
    {
        $address_id = $data1;
        $date = $data2;
        $year = date("Y",strtotime($date));
        $PreMonth = date("m",strtotime("$date -1 month"));

        $date_search = $year."-".$PreMonth;

        $query = DB::table('bills AS b')
        ->where('address_id', $address_id)
        ->where('created_at', 'like', $date_search.'%')
        ->select('latest')->get();

        $count = $query->count();

        if($count==1){
            foreach($query as $index => $item) {
                ($index == 0) ? $latest = $item->latest : null;
            }
        }
        
        return ($count!=1) ? "ไม่มีข้อมูลเดือน " . \App\Bills::MonthThai((int)$PreMonth) : $latest;
    }

    public function scopeIndexHome($query,$data)
    {
        $address_id = $data;
        $date = date('Y-m');

        $query = DB::table('bills AS b')
        ->where('b.created_at', 'like', $date.'%')
        ->where('address_id', $address_id)
        ->select('*');

        return $query;
    }

    public static function MonthThai($strDate){
        $strMonth= $strDate;
        $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
        
        return "$strMonthThai";
    }

    public function scopeReportBills($query,$data)
    {
        $date = $data;

        $query = DB::table('bills AS b')
        ->join('address AS a', 'b.address_id', '=', 'a.address_id')
        ->join('province AS p', 'a.PROVINCE_ID', '=', 'p.PROVINCE_ID')
        ->join('amphur AS am', 'a.AMPHUR_ID', '=', 'am.AMPHUR_ID')
        ->join('district AS d', 'a.DISTRICT_ID', '=', 'd.DISTRICT_ID')
        ->where('b.created_at', 'like', $date.'%')
        ->orderBy('a.serial', 'asc')
        ->select('*');

        return $query;
    }

    public static function ShowBefore($data1,$data2)
    {
        $address_id = $data1;

        $date = $data2;
        $m = substr($date,5,2);

        $query = DB::table('bills AS b')
        ->where('address_id', $address_id)
        ->where('created_at', 'like', $date.'%')
        ->select('latest')->get();

        $count = $query->count();

        if($count==1){
            foreach($query as $value) {
                $latest = $value->latest;
            }
        }
        
        return ($count!=1) ? "-" : $latest;
    }
}
