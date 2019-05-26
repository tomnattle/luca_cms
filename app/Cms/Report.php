<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $table = 'reports';
	public $timestamps = false;
    protected $fillable = ['u_id', 'site_id'];
}
