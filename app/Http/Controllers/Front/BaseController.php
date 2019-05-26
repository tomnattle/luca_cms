<?php

namespace App\Http\Controllers\Front;

use App\UserExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Pluralizer;

class BaseController extends Controller
{   

    protected function view(Request $request, $param, $tpl){

        $site = $request->get('site');
        $param = array_merge([
            'curMenu' => $request->route('menuName'),
            'site' => $site,
            'user' => UserExtra::findOrFail($site['u_id'])
        ], $param);
        return view("tpl.{$site->tpl_id}.{$request->route('menuName')}_{$tpl}", $param);
    }
}
