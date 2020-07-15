<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    protected $table = 'address';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'address_id', 'name', 'tel', 'PROVINCE_ID', 'AMPHUR_ID', 'DISTRICT_ID', 'postcode', 'address', 'serial', 'unit', 'status',
    ];

    public function scopeAddressAll($query)
    {
        $query = DB::table('address AS a')
        ->join('province AS p', 'a.PROVINCE_ID', '=', 'p.PROVINCE_ID')
        ->join('amphur AS am', 'a.AMPHUR_ID', '=', 'am.AMPHUR_ID')
        ->join('district AS d', 'a.DISTRICT_ID', '=', 'd.DISTRICT_ID')
        ->select('*')
        ->orderBy("serial", "asc");

        return $query;
    }
}
