<?php

namespace App\Cms;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ArticleCat extends Model
{
    protected $primaryKey = 'cid';
    use SoftDeletes;

     protected $dates = ['deleted_at'];
}
