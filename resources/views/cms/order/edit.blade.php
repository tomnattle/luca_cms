@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class="active"><a href="{{url('/home/orders')}}">订单<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="javascript:history.back()" type="button" class="btn btn-info"><span
        class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <tr>
                <td align="center" colspan="2">订单详情</td>
            </tr>
            <tr>
                <td align="center" width="60">名称</td><td align="">{{$order['name']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">单号</td><td align="">{{$order['uuid']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">价格</td><td align="">{{$order['price']}}¥</td>
            </tr>
            <tr>
                <td align="center" width="60">地址</td><td align="">{{$order['address']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">电话</td><td align="">{{$order['phone']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">创建</td><td align="">{{$order['created_at']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">更新</td><td align="">{{$order['updated_at']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">备注</td><td align="">{{$order['note']}}</td>
            </tr>
            <tr>
                <td align="center" width="60">状态</td>
                <td>
                    <font color="red">
                    @if($order['status']===0) 未支付 @endif
                    @if($order['status']===1) 已支付 @endif
                    @if($order['status']===2) 已发货 @endif
                    @if($order['status']===3) 已收货 @endif
                    @if($order['status']===4) 已删除 @endif
                    @if($order['status']===5) 已取消 @endif
                    @if($order['status']===6) 已完成 @endif
                    </font>
                </td>
            </tr>
            <tr>
                <td align="" colspan="2" >
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default"  data-toggle="collapse" data-target="#order-items" aria-expanded="false" aria-controls="order-items">查看商品</button>
                        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#log" aria-expanded="false" aria-controls="log">查看日志</button>
                    </div>
                    <div style="height:200px; overflow:auto; overflow-y:scroll">
                        <div class="collapse" id="order-items">
                            <div class="well">
                                <table class="table table-striped table-bordered _list">
                                    <tr>
                                        <th><font color=red>名称</font></th>
                                        <th><font color=red>数量</font></th>
                                        <th><font color=red>单价/原价</font></th>
                                        <th><font color=red>总价</font></th>
                                    </tr>
                                    @foreach($items as $item)
                                    <tr>
                                        <td><font >{{$item['name']}}</font></td>
                                        <td><font >{{$item['count']}}</font></td>
                                        <td><font >{{$item['price']}}/{{$item['price_origin']}}</font></td>
                                        <td><font >{{$item['price'] * $item['count']}}</font></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="collapse" id="log">
                            <div class="well">
                                <ul>
                                    @foreach(array_reverse($order['log']) as $log)
                                    <li><font color=grey>{{$log['date']}}</font>@if($log['type']===0) <font color=red>客户</font> @else <font color=green>商家</font> @endif {{$log['msg']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <form class="form-horizontal" action="{{url('/home/orders/' . $order['id'])}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-1" >备注</label>
                            <div class="col-md-6">
                                <textarea  name="notice" class="form-control">{{$order['notice']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1" >地址</label>
                            <div class="col-md-6">
                                <input value="{{$order['address']}}" class="form-control"  name="address"/>
                            </div>
                        </div>
                        <div class="input-group" role="group" aria-label="...">
                            <input type="submit" name="status" class="btn btn-danger" value="删除" style="margin-left: 5px;"/>
                            <input type="submit" name="status" class="btn btn-info" value="更新" style="margin-left: 5px;" />
                            <input type="submit" name="status" class="btn btn-info" value="发货" style="margin-left: 5px;" />
                            <input type="submit" name="status" class="btn btn-success" value="完成" style="margin-left: 5px;"/>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        
    </div>
</div>
@endsection