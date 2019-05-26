<?php

namespace App\Http\Controllers\Cms;

use App\Cms\OrderItem;
use App\Cms\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public $module = 'order';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $status = (int)$request->input('status', -1);
        $orders = Order::where('site_id', $request->user()->getSite()['id']);
        if($status != -1)
            $orders->where('status', $status);
        $orders = $orders->orderby('status', 'desc')
            ->orderby('updated_at', 'desc')
            ->paginate($request->input('page_size',30));
        $orders->appends(['status' => $status]);

		return View('cms.order.index', [
            'orders' => $orders,
            'status' => $status
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		return View('cms.order.create', [

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
		return View('cms.order.show', [

		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Order $order)
    {
        if($order->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $items = OrderItem::where('order_id', $order->id)->get();
		return View('cms.order.edit', [
            'order' => $order,
            'items' => $items
		]);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if($order->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $status = $request->input('status');
        if (!in_array($status, ['发货', '完成', '删除', '更新']))
            throw new \Exeception('status unvalid');


        if($order->address != $request->input('address')){
            $order->addLog(Order::TYPE_PROVIDER_lOG, sprintf('更新收获地址%s为%s', $order->address, $request->input('address')));
            $order->address = $request->input('address');
        }

        if($order->notice != $request->input('notice')){
            $order->addLog(Order::TYPE_PROVIDER_lOG, sprintf('更新备注信息[%s]为[%s]', $order->notice, $request->input('notice')));
            $order->notice = $request->input('notice');
        }
        
        if($order->status != $order->getStatus($request->input('status'), 0) && $order->getStatus($request->input('status'), 0) != -1){
            $order->addLog(Order::TYPE_PROVIDER_lOG, sprintf('更新状态[%s]为[%s]', $order->getStatus($order->status, 1), $request->input('status')));
            $order->status = $order->getStatus($request->input('status'), 0);
        }
        
        $order->save();
        return redirect()->route('orders.edit', ['id' => $order->id]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}
