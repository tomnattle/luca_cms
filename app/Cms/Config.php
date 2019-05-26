<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['u_id', 'site_id', 'value'];
}
