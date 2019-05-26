<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    protected $table = 'articles';
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $casts = [
        'extra' => 'array'
    ];
}
