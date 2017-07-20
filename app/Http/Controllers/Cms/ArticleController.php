<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Article;
use App\Cms\Company;
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
    public function create()
    {
        return View('cms.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = new Article;
        $model->title = $request->has('title') ? $request->input('title') : '';
        $model->context = $request->has('context') ? $request->input('context') : '';
        $model->index = $request->has('index') ? $request->input('index') : 0;
        $model->c_id = $request->has('c_id') ? $request->input('c_id') : 0;
        $model->g_id = $request->has('g_id') ? $request->input('g_id') : 0;
        $model->cmp_id = Company::where('u_id', $request->user()->id)->first()['id'];
        if($request->hasFile('cover')) {
            $model->cover = $request->cover->store('images');
        }
        $model->save();
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
        $article->save();
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
