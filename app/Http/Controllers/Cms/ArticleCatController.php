<?php

namespace App\Http\Controllers\Cms;

use App\Cms\ArticleCat;
use App\Cms\Group;
use App\Cms\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleCatController extends Controller
{
    public $module = 'article';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $g_id = $request->has('g_id') ?  (int)$request->input('g_id') : 0;

        $articleCats = ArticleCat::where('cmp_id', $request->user()->getCompany()['id'])
            ->orderBy('index', 'desc');
        if($g_id)
            $articleCats = $articleCats->where('g_id', $g_id);

        $articleCats = $articleCats ->paginate(50);

        $groups = Group::where('cmp_id', $request->user()->getCompany()['id'])
            ->where('model_type', Group::ARTICLE)
            ->paginate(30);

        if($request->ajax()){
            return $articleCats;
        }
        return View('cms.article-cat.index', [
                'articleCats' => $articleCats,
                'g_id' => $g_id,
                'groups' => $groups
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $groups = Group::where('cmp_id', $request->user()->getCompany()['id'])
                ->where('model_type', Group::ARTICLE)
                ->paginate(30);
        return View('cms.article-cat.create', [
                'groups' => $groups
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleCat = new ArticleCat;
        $articleCat->cmp_id =  $request->user()->getCompany()['id'];
        $articleCat->g_id = $request->has('g_id') ? $request->input('g_id') : '';
        $articleCat->name = $request->has('name') ? $request->input('name') : '';
        $articleCat->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $articleCat->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $articleCat->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$articleCat->cover));
            $file->uid = $request->user()['id'];
            $file->save();
        }
        $articleCat->save();
        return  redirect()->route('article-cats.index', ['g_id' => $articleCat['g_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ArticleCat $articleCat)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCat $articleCat)
    {
         return View('cms.article-cat.edit', [
                'articleCat' => $articleCat
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCat $articleCat)
    {
        $articleCat->name = $request->has('name') ? $request->input('name') : '';
        $articleCat->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $articleCat->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $articleCat->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$articleCat->cover));
            $file->uid = $request->user()['id'];
            $file->save();
        }
        $articleCat->save();
        return  redirect()->route('article-cats.index', ['g_id' => $articleCat['g_id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArticleCat $articleCat)
    {
        $articleCat->delete();
        if($request->ajax()){
            return $articleCat->cid;
        }
        return  redirect()->route('article-cats.index', ['g_id' => $articleCat['g_id']]);
    }
}
