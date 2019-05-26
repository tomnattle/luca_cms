<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
}
