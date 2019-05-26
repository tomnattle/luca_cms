<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Article;
use App\Cms\ArticleCat;
use App\Cms\Company;
use App\Cms\ArticleGroup;
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
        $keywords = $request->has('keywords') ? $request->input('keywords') : '';

        $groups = ArticleGroup::where('site_id', $request->user()->getSite()['id'])
            ->where('model_type', ArticleGroup::ARTICLE)
            ->paginate(30);
        $articleCats = [];
        if($g_id)
           $articleCats = ArticleCat::where('site_id', $request->user()->getSite()['id'])
            ->where('g_id', $g_id)
            ->paginate(30);

        $articles = Article::where('site_id', $request->user()->getSite()['id']);
        if($g_id)
            $articles = $articles->where('g_id', $g_id);
        if($c_id)
            $articles = $articles->where('c_id', $c_id);
        if($keywords)
            $articles = $articles->where('title', 'like', '%'. $keywords .'%');

        $articles->orderBy('id', 'desc');
        $articles = $articles->paginate(15);
        $articles->appends([
                'g_id' => $g_id,
                'c_id' => $c_id,
                'keywords' => $keywords
            ]);
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
        $groups = ArticleGroup::where('model_type', ArticleGroup::ARTICLE)
            ->where('site_id', $request->user()->getSite()['id'])
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
        $article->extra = $request->has('extra') ? ($request->input('extra')) : '[]';

        $article->addr_id = $request->has('province') ? ($request->input('province')) : 0;
        if($request->has('province'))
            $article->addr_id = (int)($request->input('province'));
        if($request->has('city'))
            $article->addr_id = (int)($request->input('city'));
        if($request->has('area'))
            $article->addr_id = (int)($request->input('area'));
        if($request->has('town'))
            $article->addr_id = (int)($request->input('town'));

        $article->site_id = $request->user()->getSite()['id'];
        if($request->hasFile('cover')) {
            $article->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $article->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$article->cover));
            $file->u_id = $request->user()['id'];
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
    public function edit(Request $request, Article $article)
    {
        if($article->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
            
        $groups = ArticleGroup::where('site_id', $request->user()->getSite()['id'])
            ->where('model_type', ArticleGroup::ARTICLE)
            ->paginate(30);
        $articleCats = [];

       //$article['extra'] = json_decode($article['extra'], 1);
       $articleCats = ArticleCat::where('g_id', $article['g_id'])
        ->paginate(30);
        return View('cms.article.edit', [
                'article' => $article,
                'groups' => $groups,
                'articleCats' => $articleCats
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
        if($article->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $article->title = $request->has('title') ? $request->input('title') : '';
        $article->context = $request->has('context') ? $request->input('context') : '';
        $article->index = $request->has('index') ? $request->input('index') : 0;
        $article->c_id = $request->has('c_id') ? $request->input('c_id') : 0;
        $article->g_id = $request->has('g_id') ? $request->input('g_id') : 0;
        $article->extra = $request->has('extra') ? ($request->input('extra')) : '[]';

        $article->addr_id = $request->has('province') ? ($request->input('province')) : 0;
        if($request->has('province'))
            $article->addr_id = (int)($request->input('province'));
        if($request->has('city'))
            $article->addr_id = (int)($request->input('city'));
        if($request->has('area'))
            $article->addr_id = (int)($request->input('area'));
        if($request->has('town'))
            $article->addr_id = (int)($request->input('town'));
        
        if($request->hasFile('cover')) {
            $article->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $article->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$article->cover));
            $file->u_id = $request->user()['id'];
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
    public function destroy(Request $request, Article $article)
    {
        if($article->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $article->delete();
        if($request->ajax()){
            return $article->id;
        }
        return  redirect()->route('articles.index');
    }
}
