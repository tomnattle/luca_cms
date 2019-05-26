<?php

namespace App\Http\Controllers\cms;

use App\Cms\File;
use App\Cms\GoodsCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsCatController extends Controller
{
    public $module = 'goods';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goodsCats = GoodsCat::all();
        return View('cms.goods-cat.index', [
            'goodsCats' => $goodsCats,
            'vendor_id' => $request->input('vendor_id', 0),
            'page' => $request->input('page', 1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cms.goods-cat.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GoodsCat $cat)
    {
        $goodsCat = new GoodsCat;
        $goodsCat->site_id =  $request->user()->getSite()['id'];
        $goodsCat->u_id = $request->user()->id;
        $goodsCat->name = $request->has('name') ? $request->input('name') : '';
        $goodsCat->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $goodsCat->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $goodsCat->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$goodsCat->cover));
            $file->u_id = $request->user()['id'];
            $file->save();
        }
        $goodsCat->save();
        return  redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsCat $cat)
    {
        return View('cms.goods-cat.edit', [
            'cat' => $cat
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsCat $cat)
    {
        if($cat->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $cat->name = $request->has('name') ? $request->input('name') : '';
        $cat->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $cat->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $cat->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$cat->cover));
            $file->u_id = $request->user()['id'];
            $file->save();
        }
        $cat->save();
        return  redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\GoodsCat  $goodsCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GoodsCat $cat)
    {
        if($cat->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $cat->delete();
        if($request->ajax()){
            return $cat->id;
        }
        return  redirect()->route('cats.index');
    }
}
