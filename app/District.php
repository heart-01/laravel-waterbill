<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class District extends Model
{
    protected $table = 'district';
    public $timestamps = false;

    protected $primaryKey = 'DISTRICT_ID';

    protected $fillable = [
        'DISTRICT_ID', 'DISTRICT_CODE', 'DISTRICT_NAME', 'AMPHUR_ID', 'PROVINCE_ID', 'GEO_ID',
    ];

    public function scopeDistrict($query,$data1,$data2)
    {
        $PROVINCE_ID = $data1;
        $AMPHUR_ID = $data2;
        $query = DB::table('district AS d')
        ->select('*')
        ->where('d.PROVINCE_ID', '=', $PROVINCE_ID)
        ->where('d.AMPHUR_ID', '=', $AMPHUR_ID);

        return $query;
    }
}
