<?php

namespace App\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dict extends Model
{
    protected $table = 'dicts';
     use SoftDeletes;

     protected $dates = ['deleted_at'];
}
