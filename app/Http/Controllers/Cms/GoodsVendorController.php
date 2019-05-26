<?php

namespace App\Http\Controllers\Cms;

use App\Cms\File;
use App\Cms\GoodsVendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsVendorController extends Controller
{

    public $module = 'goods';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goodsVendors = GoodsVendor::orderBy('index','desc')->orderBy('id','desc')->get();
        return View('cms.goods-vendor.index', [
            'goodsVendors' => $goodsVendors,
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
        return View('cms.goods-vendor.create', [
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
        $goodsVendor = new GoodsVendor;
        $goodsVendor->site_id =  $request->user()->getSite()['id'];
        $goodsVendor->u_id = $request->user()->id;
        $goodsVendor->name = $request->has('name') ? $request->input('name') : '';
        $goodsVendor->address = $request->has('address') ? $request->input('address') : '';
        $goodsVendor->code = $request->has('code') ? $request->input('code') : '';
        $goodsVendor->desc = $request->has('desc') ? $request->input('desc') : '';
        $goodsVendor->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $goodsVendor->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $goodsVendor->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$goodsVendor->cover));
            $file->u_id = $request->user()['id'];
            $file->save();
        }
        $goodsVendor->save();
        return  redirect()->route('vendors.index');
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
    public function edit(Request $request, GoodsVendor $vendor)
    {
        if($vendor->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        return View('cms.goods-vendor.edit', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsVendor $vendor)
    {
        if($vendor->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $vendor->name = $request->has('name') ? $request->input('name') : '';
        $vendor->address = $request->has('address') ? $request->input('address') : '';
        $vendor->code = $request->has('code') ? $request->input('code') : '';
        $vendor->desc = $request->has('desc') ? $request->input('desc') : '';
        $vendor->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $vendor->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $vendor->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$vendor->cover));
            $file->u_id = $request->user()['id'];
            $file->save();
        }
        $vendor->save();
        return  redirect()->route('vendors.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Cms\GoodsVendor  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GoodsVendor $vendor)
    {
        if($vendor->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $vendor->delete();
        if($request->ajax()){
            return $vendor->id;
        }
        return  redirect()->route('vendors.index');
    }
}
