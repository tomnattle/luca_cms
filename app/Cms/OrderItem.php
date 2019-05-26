<?php

namespace App\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orders_items';
    public $timestamps = false;
    
}
