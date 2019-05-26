<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $module = 'setting';

    public function index(){
        return redirect('/home/users/profile');
    }
}
