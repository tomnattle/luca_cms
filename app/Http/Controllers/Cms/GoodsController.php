<?php

namespace App\Http\Controllers\Cms;

use Ramsey\Uuid\Uuid;
use App\Cms\File;
use App\Cms\GoodsCat;
use App\Cms\GoodsVendor;
use App\Cms\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GoodsController extends Controller
{
    public $module = 'goods';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cats = GoodsCat::where('site_id', $request->user()->getSite()['id'])->get();
        $vendors = GoodsVendor::where('site_id', $request->user()->getSite()['id'])->get();
        $is_show = (int)$request->input('is_show', -1);
        $vendor_id = (int)$request->input('vendor_id');
        $c_id = (int)$request->input('c_id');
        $goods = Goods::where('site_id', $request->user()->getSite()['id']);
        if($is_show >= 0)
            $goods->where('is_show', $is_show);
        if($c_id)
            $goods->where('c_id', $c_id);
        if($vendor_id)
            $goods->where('vendor_id', $vendor_id);
        $goods = $goods->orderby('is_show', 'desc')
            ->orderby('id', 'desc')
            ->paginate($request->input('page_size',15));
        $goods->appends(['is_show' => $is_show]);

        return View('cms.goods.index', [
            'is_show' => $is_show,
            'cats' => $cats,
            'vendors' => $vendors,
            'goods' => $goods,
            'c_id' => $request->input('c_id', 0),
            'vendor_id' => $request->input('vendor_id', 0),
            'page' => $request->input('page', 1)
        ]);
    }

    public function onoff(Request $request)
    {
        $state = $request->input('state','');
        $ids = $request->input("ids", []);
        if(!is_array($ids) || count($ids) > 15)
            throw new \Exception("ids not valid");
        if($state == '上架')
        {
            Goods::whereIn('id', $ids)
                ->where('site_id', $request->user()->getSite()['id'])
                ->update(['is_show' => 1]);
        }elseif($state == '下架')
        {
            Goods::whereIn('id', $ids)
                ->where('site_id', $request->user()->getSite()['id'])
                ->update(['is_show' => 0]);
        }else{
            throw new \Exception('unkown state');
        }

        return redirect()->route('goods.index', [
            'is_show' => $request->input('is_show', -1),
            'page' => $request->input('page', 1),
            'c_id' => $request->input('c_id', 0),
            'vendor_id' => $request->input('vendor_id', 0)
        ]);
    }

    public function groups(){
        return ['data' => json_decode(file_get_contents(config_path() . '/goods_cat.json'), 1)];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cats = GoodsCat::where('site_id', $request->user()->getSite()['id'])->get();
        $vendors = GoodsVendor::where('site_id', $request->user()->getSite()['id'])->get();

        return View('cms.goods.create', [
            'cats' => $cats,
            'vendors' => $vendors
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
        $goods = new Goods();
        if($request->hasFile('cover')) {
            $goods->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $goods->cover;
            $file->hash = md5_file(storage_path('/app/public/' . $goods->cover));
            $file->u_id = $request->user()['id'];
            $file->save();
        }

        $goods->title = $request->input('title', '');
        $goods->name = $request->input('name', '');
        $goods->uuid = Uuid::uuid1()->toString();
        $goods->u_id = $request->user()->id;
        $goods->site_id = $request->user()->getSite()['id'];
        $goods->g_id = $request->input('g_id', 0);
        $goods->c_id = $request->input('c_id', 0);
        $goods->vendor_id = $request->input('vendor_id', 0);
        $goods->sku = $request->input('sku', '');
        $goods->g_name = $request->input('g_name', '');
        $goods->stock = $request->input('stock', 0);
        $goods->logistics = $request->input('logistics', '');
        $goods->condition = $request->input('condition', '');
        $goods->price = $request->input('price', 0.0);
        $goods->price_original = $request->input('price_original', 0.0);
        $goods->weight = $request->input('weight', 0);
        $goods->weight_gross = $request->input('weight_gross', 0);
        $goods->note = $request->input('note', '');
        $goods->desc = $request->input('desc', '');
        $goods->sell_count = 0;
        $goods->sell_count_today = 0;
        $goods->view_count = 0;
        $goods->view_count_today = 0;
        $goods->like_count = 0;
        $goods->add_cart_count = 0;
        $goods->add_cart_count_today = 0;
        $goods->store_count = 0;
        $goods->comment_count = 0;
        $goods->Save();
        return redirect()->route('goods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Goods  $article
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return View('cms.goods.show', [

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Goods  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Goods $good)
    {
        if($good->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        return View('cms.goods.edit', [
            'goods' => $good,
            'cats' => GoodsCat::where('site_id', $request->user()->getSite()['id'])->get(),
            'vendors' => GoodsVendor::where('site_id', $request->user()->getSite()['id'])->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Goods  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Goods $good)
    {
        if($good->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $good->title = $request->input('title', '');
        $good->name = $request->input('name', '');
        $good->uuid = Uuid::uuid1()->toString();
        $good->u_id = $request->user()->id;
        $good->site_id = $request->user()->getSite()['id'];
        $good->g_id = $request->input('g_id', 0);
        $good->c_id = $request->input('c_id', 0);
        $good->g_name = $request->input('g_name', '');
        $good->vendor_id = $request->input('vendor_id', 0);
        $good->stock = $request->input('stock', 0);
        $good->logistics = $request->input('logistics', '');
        $good->condition = $request->input('condition', '');
        $good->price = $request->input('price', 0.0);
        $good->price_original = $request->input('price_original', 0.0);
        $good->weight = $request->input('weight', 0);
        $good->weight_gross = $request->input('weight_gross', 0);
        $good->note = $request->input('note', '');
        $good->desc = $request->input('desc', '');
        $good->save();
        return redirect()->route('goods.edit', ['id' => $good->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Goods  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}
