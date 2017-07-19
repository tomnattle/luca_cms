<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $module = '';
    
    public function index(){
        return View('cms.home.index');
    }
}
