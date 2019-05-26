<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $module = 'home';

    public function index(Request $request)
    {
        return $this->view($request, [

        ], 'index');
    }

    private function document(Request $request)
    {
        return '';
    }
}
