<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Template extends Model
{
    protected $table = 'templates';
    use SoftDeletes;

    protected $casts = [
        'config' => 'array',
    ];

}
