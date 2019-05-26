<?php

namespace App\Site;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    
    protected $table = 'comments';
    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
