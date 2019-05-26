<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cms\Company;
use App\Repositories\Cms\ArticleRepository;

class HomeController extends Controller
{
    protected $module = '';
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository = $articleRepository;
    }
    
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
                return "/company/home?view=" .$pageName . '&' . http_build_query($params);
            },
            'page' => $request->has('page') ? (int)$request->input('page') : 1,
            'id' => $request->has('id') ? (int)$request->input('id') : 0,
            'repository' => function ($name){
                $loaders = [
                    'article' => $this->articleRepository
                ];
                return $loaders[$name];
            }
        ]);
    }
}
