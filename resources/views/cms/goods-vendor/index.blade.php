@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class=""><a href="{{url('/home/goods')}}">商品<span class="sr-only">(current)</span></a></li>
    <li class=""><a href="{{url('/home/goods/cats')}}">分组<span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="{{url('/home/goods/vendors')}}">厂商<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{url('home/goods/vendors/create')}}" type="button" class="btn btn-info">
            新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        </a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped _list">
                    <tr>
                        <th class="">名称</th>
                        <th class="" width="90">排序</th>
                        <th class="" width="90">时间</th>
                        <th class="" width="100">操作</th>
                    </tr>
                    @foreach ($goodsVendors as $goodsVendor)
                    <tr>
                        <td class="">{{$goodsVendor['name']}}</td>
                        <th class="" width="90">{{$goodsVendor['index']}}</th>
                        <td class="" width="90">{{date('Y-m-d',strtotime($goodsVendor['created_at']))}}</td>
                        <td class="" width="50">
                            
                            <a class="btn btn-danger btn-xs bt_del_goods_vendor"
                            data-id="{{$goodsVendor['id']}}" href="javascript:void(0)">删除</a>
                            <a class="btn btn-info btn-xs" 
                            href="{{url('/home/goods/vendors/' . $goodsVendor['id'] . '/edit')}}">编辑</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection