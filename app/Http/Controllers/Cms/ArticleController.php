<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Article;
use App\Cms\Company;
use App\Cms\Group;
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
    public function index()
    {
        $articles = Article::paginate(15);
        return View('cms.article.index', [
                'articles' => $articles
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
        $articlearticle->title = $request->has('title') ? $request->input('title') : '';
        $article->context = $request->has('context') ? $request->input('context') : '';
        $article->index = $request->has('index') ? $request->input('index') : 0;
        $article->c_id = $request->has('c_id') ? $request->input('c_id') : 0;
        $article->g_id = $request->has('g_id') ? $request->input('g_id') : 0;
        $article->cmp_id = Company::where('u_id', $request->user()->id)->first()['id'];
        if($request->hasFile('cover')) {
            $article->cover = $request->cover->store('images');
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
