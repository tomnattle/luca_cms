<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Init extends Model
{
    protected $table = 'user_inits';
    public $timestamps = false;

    protected $primaryKey = 'u_id';

}
