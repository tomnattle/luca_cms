<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
	use SoftDeletes;
	protected $table = 'job_resumes';
	protected $dates = ['deleted_at'];
}
