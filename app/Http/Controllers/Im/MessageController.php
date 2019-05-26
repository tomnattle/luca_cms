<?php

namespace App\Http\Controllers\Im;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public $module = 'im.message';

    public function index(Request $request)
    {
        return View('im.message.index', [

        ]);
    }
}
