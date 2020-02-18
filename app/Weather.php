<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $guarded=[];
    protected $hidden = [
        'id','created_at','updated_at',
    ];
}
