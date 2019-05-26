<?php

namespace App\Cms;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JobGroup extends Model
{
	protected $table = 'job_groups';
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}
