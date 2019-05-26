<?php

namespace App\Http\Controllers\Front;

use App\Cms\Article;
use App\Cms\ArticleCat;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{

    protected $module = 'article';

    public function getGid(Request $request){
        $site = $request->get('site');
        $gid = $site->tpl_config['menus'][$request->route('menuName')]['g_id'];
        return $gid;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $siteName, $muneName)
    {   
        $article = Article::where('g_id', $this->getGid($request));
        if($request->has('c_id'))
            $article->where('c_id', (int)$request->input('c_id'));
        //620521109->620521->620500->620000
        if($request->has('addr_id')){
            $addr_id = $request->input('addr_id');
            if (strlen($addr_id) == 9) {
                // 镇
                $article->where('addr_id', (int)$addr_id);
             } elseif ((int)$addr_id % 10000 == 0) {
                $article->where(function($query) use($addr_id){
                    // 省
                    $query->where('addr_id', (int)$addr_id);
                    // 市
                    // 县
                    $query->orwhereBetween('addr_id', [(int)$addr_id, (int)$addr_id + 10000 ]);
                    // 镇
                    $query->orwhereBetween('addr_id', [(int)$addr_id * 1000, ((int)$addr_id +10000) * 1000]);
                });
             } elseif ((int)$addr_id % 100 == 0) {
                
                $article->where(function($query) use($addr_id){
                    // 市
                    $query->where('addr_id', (int)$addr_id);
                    // 县
                    $query->orwhereBetween('addr_id', [(int)$addr_id, (int)$addr_id + 100 ]);
                    // 镇
                    $query->orwhereBetween('addr_id', [(int)$addr_id * 1000, ((int)$addr_id +10000) * 1000]);
                });
             } else {
                $article->where(function($query) use($addr_id){
                    // 县
                    $query->where('addr_id', (int)$addr_id);
                    // 镇
                    $query->orwhereBetween('addr_id', [(int)$addr_id * 1000, ((int)$addr_id +10000) * 1000]);
                });

             }
        }

        return $this->view($request, [
            'cid' => (int)$request->input('c_id'),
            'cats' => ArticleCat::where('g_id', $this->getGid($request))->get(),
            'articles' => $article->paginate(30)
        ], 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $siteName, $muneName, $id)
    {
        return $this->view($request, [
            'cats' => ArticleCat::where('g_id', $this->getGid($request))->get(),
            'article' =>  Article::findOrFail($id),
        ], 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
