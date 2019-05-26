@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class="active"><a href="{{url('/home/goods')}}">商品<span class="sr-only">(current)</span></a></li>
	<li class=""><a href="{{url('/home/goods/cats')}}">分组<span class="sr-only">(current)</span></a></li>
	<li class=""><a href="{{url('/home/goods/vendors')}}">厂商<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/goods/attrs')}}">参数<span class="sr-only">(current)</span></a></li>-->
</ul>
<form action="{{url('/home/goods/state')}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="page" value="{{$page}}">
	<input type="hidden" name="c_id" value="{{$c_id}}">
	<input type="hidden" name="vendor_id" value="{{$vendor_id}}">
	<input type="hidden" name="is_show" value="{{$is_show}}">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4">
					<a href="{{url('/home/goods/create')}}" type="button" class="btn btn-info">
						新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-2">
						<input type="submit" name="state"  class="btn btn-danger" value="下架">
						<input type="submit" name="state" class="btn btn-success" value="上架">
					</div>
					<div class="col-xs-2">
						<select class="form-control addSearchRefresh" name="is_show" >
							<option value="-1" @if($is_show==='') selected @endif>全部</option>
							<option value="1" @if($is_show===1) selected @endif>发布中</option>
							<option value="0" @if($is_show===0) selected @endif>已关闭</option>
						</select>
					</div>
					<div class="col-xs-2">
						<select name="c_id"  class="form-control addSearchRefresh" id="select_cat">
							<option value="">请选择分类..</option>
							@foreach($cats as $cat)
							<option value="{{$cat['id']}}"
								@if($c_id == $cat['id'])
								selected="selected"
								@endif
							>{{$cat['name']}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-xs-2">
						<select name="vendor_id" class="form-control addSearchRefresh" id="select_cat">
							<option value="">请选择厂商..</option>
							@foreach($vendors as $vendor)
							<option value="{{$vendor['id']}}"
								@if($vendor_id == $vendor['id'])
								selected="selected"
								@endif
							>{{$vendor['name']}}</option>
							@endforeach
						</select>
					</div>
					
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered _list">
					<tr>
						<th class="" width=20></th>
						<th class="" width=50>状态</th>
						<th class="">品名</th>
						<th class="">价格<br><span style="font-size:10px;font-weight:normal">(现价/原价)</span></th>
						<th class="">库存</th>
						<th class="">购买量<br><span style="font-size:10px;font-weight:normal">(购物车/销量)</span></th>
						<th class="">热度<br><span style="font-size:10px;font-weight:normal">(喜欢/收藏/评论)</span></th>
						<th class="">曝光量<br><span style="font-size:10px;font-weight:normal">(今日/全部)</span></th>
						<th class="" width="90">更新时间</th>
					</tr>
					@foreach($goods as $_goods)
					<tr>
						<td class="">
							<label>
								<input name="ids[]" value="{{$_goods['id']}}" type="checkbox">
							</label>
						</td>
						<td class=""><?php if($_goods['is_show']==1){echo '在售';}else{echo '下线';};?></td>
						<td class="" title="{{$_goods['title']}}"><a  href="/home/goods/{{$_goods['id']}}/edit">{{$_goods['name']}}</a></td>
						<td class="">{{$_goods['price']}}/{{$_goods['price_original']}}</td>
						<td class="">{{$_goods['stock']}}</td>
						<td class="">{{$_goods['add_cart_count_today']}}/{{$_goods['add_cart_count']}}</td>
						<td class="">
							<button class="btn btn-info btn-xs" title="喜欢" type="button">
								<span class='glyphicon glyphicon-thumbs-up'></span> 
								<span class="badge">{{$_goods['like_count']}}</span>
							</button>
							<button class="btn btn-info btn-xs" title="收藏" type="button">
								<span class='glyphicon glyphicon-star-empty'></span> 
								<span class="badge">{{$_goods['store_count']}}</span>
							</button>
							<button class="btn btn-info btn-xs" title="评论" type="button">
								<span class='glyphicon glyphicon-comment'></span> 
								<span class="badge">{{$_goods['comment_count']}}</span>
							</button>
						</td>
						<td class="">{{$_goods['view_count_today']}}/{{$_goods['view_count']}}</td>
						<td class="" width="90">{{date('Y-m-d', strtotime($_goods['updated_at']))}}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</form>
	@endsection