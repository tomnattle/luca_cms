<?php

namespace App\Http\Controllers\Im;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LbsController extends Controller
{
    public $module = 'im.lbs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return View('im.lbs.index', [

        ]);
    }

}
