<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'id', 'tel', 'status_id', 'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
