<?php

namespace App\Cms;

use App\Observers\Cms\SiteObserver;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use SoftDeletes;
    protected $table = 'sites';
    protected $dates = ['deleted_at'];
    protected $casts = [
        'tpl_config' => 'array',
    ];

    public static function boot()
    {
        parent::boot(); 
        static::observe(new SiteObserver());
    }
}
