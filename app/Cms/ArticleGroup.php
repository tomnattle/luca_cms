<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleGroup extends Model
{
    use SoftDeletes;
    protected $table = 'article_groups';
    const ARTICLE = 1;
    const ALBUM = 2;
    const GOODS = 3;
}
