<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExtra extends Model
{
	protected $table = 'user_extras';
	protected $primaryKey = 'u_id';
	public $timestamps = false;
    protected $fillable = ['u_id'];
}
