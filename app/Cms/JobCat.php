<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JobCat extends Model
{
	protected $table = 'job_cats';
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}
