<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $module = 'admin';

    public function index(){
        
        
        return view('home', [

        ]);
    }

}
