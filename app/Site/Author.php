<?php

namespace App\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    protected $table = 'authors';
     use SoftDeletes;

     protected $dates = ['deleted_at'];
}
