<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
     protected $table = 'blogs';
     use SoftDeletes;

     protected $dates = ['deleted_at'];
}
