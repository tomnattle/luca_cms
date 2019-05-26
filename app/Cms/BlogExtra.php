<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogExtra extends Model
{
     protected $table = 'blog_extras';
	 public $timestamps = false;
}
