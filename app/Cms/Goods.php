<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	protected $table = 'goods';
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}
