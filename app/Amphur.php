<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Amphur extends Model
{
    protected $table = 'amphur';
    public $timestamps = false;

    protected $primaryKey = 'AMPHUR_ID';

    protected $fillable = [
        'AMPHUR_ID', 'AMPHUR_CODE', 'AMPHUR_NAME', 'GEO_ID', 'PROVINCE_ID',
    ];

    public function scopeAmphur($query,$data)
    {
        $PROVINCE_ID = $data;
        $query = DB::table('amphur AS a')
        ->select('*')
        ->where('a.PROVINCE_ID', '=', $PROVINCE_ID);

        return $query;
    }
}
