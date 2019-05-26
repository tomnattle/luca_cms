<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Job extends Model
{
	protected $table = 'jobs';
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}
