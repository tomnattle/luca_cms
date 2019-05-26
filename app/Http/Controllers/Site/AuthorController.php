<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    protected $module = 'author';

    public function index(Request $request){
        return View('front.author.index', [

        ]);
    }
}
