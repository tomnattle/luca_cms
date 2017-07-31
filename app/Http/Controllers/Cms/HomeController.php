<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cms\Company;

class HomeController extends Controller
{
    protected $module = '';
    
    public function index(){
        $company = config('app.company');
        if($company)
            return redirect()->route('/company/home', ['name'=> $company]);
    }

    public function company(Request $request){
        $company = Company::where([
            'name' => config('app.company')
            ])->first();
        
        $view = (!$request->has('view'))? 'index' : $request->input('view');
        return View('company.' . config('app.company') . '.' . $view,[
            'company' => $company,
            'view' => resource_path('views') . '/company/' . config('app.company'),
            '_url' => function($pageName, $params = []){
                return "/company/home?view=" .$pageName . '&' . implode('&', $params);
            }
        ]);
    }
}
