<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    public $timestamps = false;

    protected $primaryKey = 'PROVINCE_ID';

    protected $fillable = [
        'PROVINCE_ID', 'PROVINCE_CODE', 'PROVINCE_NAME', 'GEO_ID',
    ];
}
