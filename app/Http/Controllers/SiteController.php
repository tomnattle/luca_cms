<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public $module = 'site';

    public function index(){

        return View('front.site.index',[]);
    }
}
