<?php

namespace App\Http\Controllers\Cms;

use App\Cms\ArticleCat;
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
        $articleCats = ArticleCat::all();
        if($request->ajax()){
            return $articleCats;
        }
        
        // form
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
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCat $articleCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCat $articleCat)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\ArticleCat  $articleCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCat $articleCat)
    {
        //
    }
}
