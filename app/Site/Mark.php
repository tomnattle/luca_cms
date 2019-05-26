<?php

namespace App\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    protected $table = 'comment_marks';
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
