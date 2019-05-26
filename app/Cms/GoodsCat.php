<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class GoodsCat extends Model
{
	protected $table = 'goods_cats';
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}
