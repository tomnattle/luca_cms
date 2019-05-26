<?php

namespace App\Http\Controllers\Cms;

use App\Cms\ArticleGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleGroupController extends Controller
{

     public $module = 'group';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $groups = ArticleGroup::where('site_id', $request->user()->getSite()['id'])
                ->paginate(30);

       return View('cms.group.index', [
            'groups' => $groups,
            'groupNames' => $this->getArticleGroupName()
        ]);

    }
    

    public function getArticleGroupName(){
        return [
            ArticleGroup::ARTICLE => '文章',
            ArticleGroup::ALBUM => '相册',
            ArticleGroup::GOODS => '商品',
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cms.group.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ArticleGroup $articleGroup)
    {
        $this->validate($request, [
            'model_type' => 'required|integer|max:3|min:1',
            'name' => 'required',
            'index' => 'required|integer|max:1000|min:0'
        ]);

        $articleGroup->model_type = $request->input('model_type');
        $articleGroup->name = $request->input('name');
        $articleGroup->index = $request->input('index');
        $articleGroup->site_id = $request->user()->getSite()['id'];
        $articleGroup->en_name = '';
        $articleGroup->save();
        return redirect()->route('article-groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\ArticleGroup  $group
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleGroup $group)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\ArticleGroup  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ArticleGroup $articleGroup)
    {
        if($articleGroup->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        return View('cms.group.edit', [
            'group' => $articleGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\ArticleGroup  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleGroup $articleGroup)
    {
        if($articleGroup->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");

        $this->validate($request, [
            'model_type' => 'required|integer|max:3|min:1',
            'name' => 'required',
            'index' => 'required|integer|max:1000|min:0'
        ]);

        $articleGroup->model_type = $request->input('model_type');
        $articleGroup->name = $request->input('name');
        $articleGroup->index = $request->input('index');
        $articleGroup->en_name = '';
        $articleGroup->save();
        return redirect()->route('article-groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\ArticleGroup  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArticleGroup $articleGroup)
    {
        if($articleGroup->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        
        $articleGroup->delete();
        if($request->ajax()){
            return $articleGroup->id;
        }
    }
}
