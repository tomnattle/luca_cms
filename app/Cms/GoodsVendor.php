<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class GoodsVendor extends Model
{
	protected $table = 'goods_vendors';
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}
