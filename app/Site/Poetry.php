<?php

namespace App\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poetry extends Model
{
    protected $table = 'poetries';
     use SoftDeletes;

     protected $dates = ['deleted_at'];
}
