@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class="active"><a href="{{url('/home/orders')}}">订单<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
	<div class="panel-heading">
		<form action="{{url('/home/articles')}}" method="GET">
			<div class="row">
				<div class="col-xs-2">
					<select class="form-control addSearchRefresh" name="status" onchange="">
						<option value="-1" @if($status==='') selected @endif>全部</option>
						<option value="0" @if($status===0) selected @endif>未支付</option>
						<option value="1" @if($status===1) selected @endif>已支付</option>
						<option value="2" @if($status===2) selected @endif>已发货</option>
						<option value="3" @if($status===3) selected @endif>已收货</option>
						<option value="4" @if($status===4) selected @endif>已删除</option>
						<option value="5" @if($status===5) selected @endif>已取消</option>
						<option value="6" @if($status===6) selected @endif>已完成</option>
						
					</select>
				</div>
			</div>
		</form>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-bordered _list">
			<tr>
				<th class="" width=20></th>
				<th class="" width=70>状态</th>
				<th class="">单号</th>
				<th class="">总价</th>
				<th class="">地址</th>
				<td class="">备注</td>
				<th class="" width="90">更新时间</th>
			</tr>
			@foreach($orders as $order)
			<tr>
				<td class="">
					<label>
						<input name="ids[]" value="{{$order['id']}}" type="checkbox">
					</label>
				</td>
				<td class="">
					@if($order['status']===0) 未支付 @endif
					@if($order['status']===1) 已支付 @endif
					@if($order['status']===2) 已发货 @endif
					@if($order['status']===3) 已收货 @endif
					@if($order['status']===4) 已删除 @endif
					@if($order['status']===5) 已取消 @endif
					@if($order['status']===6) 已完成 @endif
				</td>
				<td class=""><a href="/home/orders/{{$order['id']}}/edit">{{$order['uuid']}}</a></td>
				<td class="">{{$order['price']}}</td>
				<td class="">{{$order['address']}}</td>
				<td class="">{{$order['note']}}</td>
				<td class="" width="90">{{date('Y-m-d', strtotime($order['updated_at']))}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection