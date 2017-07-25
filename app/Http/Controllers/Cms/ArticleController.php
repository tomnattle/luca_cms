<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Article;
use App\Cms\ArticleCat;
use App\Cms\Company;
use App\Cms\Group;
use App\Cms\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    public $module = 'article';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $g_id = $request->has('g_id') ? (int)$request->input('g_id') : 0;
        $c_id = $request->has('c_id') ? (int)$request->input('c_id') : 0;
        $keywords = $request->has('keywords') ? (int)$request->input('keywords') : '';
        
        $groups = Group::where('cmp_id', $request->user()->getCompany()['id'])
            ->where('model_type', Group::ARTICLE)
            ->paginate(30);
        $articleCats = [];
        if($g_id)
           $articleCats = ArticleCat::where('cmp_id', $request->user()->getCompany()['id'])
            ->where('g_id', $g_id)
            ->paginate(30);
                
        $articles = Article::where('cmp_id', $request->user()->getCompany()['id']);
        if($g_id)
            $articles = $articles->where('g_id', $g_id);
        if($c_id)
            $articles = $articles->where('c_id', $c_id);
        if($keywords)
            $articles = $articles->where('title', 'like', '%'. $keywords .'%');

        $articles = $articles->paginate(15);
        return View('cms.article.index', [
                'articles' => $articles,
                'groups' => $groups,
                'articleCats' => $articleCats,
                'c_id' => $c_id,
                'g_id' => $g_id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $groups = Group::where('model_type', Group::ARTICLE)
            ->where('cmp_id', $request->user()->getCompany()['id'])
            ->orderBy('created_at', 'desc')
            ->orderBy('index', 'desc')
            ->get();
        return View('cms.article.create', [
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

        $article = new Article;
        $article->title = $request->has('title') ? $request->input('title') : '';
        $article->context = $request->has('context') ? $request->input('context') : '';
        $article->index = $request->has('index') ? $request->input('index') : 0;
        $article->c_id = $request->has('c_id') ? $request->input('c_id') : 0;
        $article->g_id = $request->has('g_id') ? $request->input('g_id') : 0;
        $article->cmp_id = Company::where('u_id', $request->user()->id)->first()['id'];
        if($request->hasFile('cover')) {
            $article->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $article->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$article->cover));
            $file->uid = $request->user()['id'];
            $file->save();
        }
        $article->save();
        return  redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return View('cms.article.edit', [
                'article' => $article
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        
        $article->title = $request->has('title') ? $request->input('title') : '';
        $article->context = $request->has('context') ? $request->input('context') : '';
        $article->index = $request->has('index') ? $request->input('index') : 0;
        $article->c_id = $request->has('c_id') ? $request->input('c_id') : 0;
        $article->g_id = $request->has('g_id') ? $request->input('g_id') : 0;
        $article->cmp_id = Company::where('u_id', $request->user()->id)->first()['id'];
        if($request->hasFile('cover')) {
            $article->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $article->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$article->cover));
            $file->uid = $request->user()['id'];
            $file->save();
        }
        $article->save();
        return  redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {   
        $article->delete();
        return  redirect()->route('articles.index');
    }
}
