@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class="active"><a href="{{url('/home/goods')}}">商品<span class="sr-only">(current)</span></a></li>
	<li class=""><a href="{{url('/home/goods/cats')}}">分组<span class="sr-only">(current)</span></a></li>
	<li class=""><a href="{{url('/home/goods/vendors')}}">厂商<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/goods/attrs')}}">参数<span class="sr-only">(current)</span></a></li>-->
</ul>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-3">
				<a href="{{url('/home/goods')}}" type="button" class="btn btn-info">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				返回 </a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="{{url('/home/goods/' . $goods['id'])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class='control-label col-md-1' >货号</label>
				<div class="col-md-2">
					<input type="text" name="sku" disabled value="{{$goods['sku']}}"   class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >标题</label>
				<div class="col-md-2">
					<input type="text" name="title" value="{{$goods['title']}}" class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >商品名称</label>
				<div class="col-md-2">
					<input type="text" name="name" value="{{$goods['name']}}" class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >分类</label>
				<div class="col-md-2">
					<select name="c_id" class="form-control">
						<option>请选择分类...</option>
						@foreach($cats as $cat)
						<option value="{{$cat['id']}}" @if($cat['id'] == $goods['c_id']) selected  @endif>{{$cat['name']}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					<input type="hidden" id="g_id" value="{{$goods['g_id']}}"  name="g_id">
					<div class="dropdown">
						<a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-default"  href="javascript:;">
							请选择分组... <span class="caret"></span>
						</a>
						<ul id="good_cats" class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control"  id="g_name" value="{{$goods['g_name']}}" name="g_name">
				</div>
				<div class="col-md-2">
					<select name="vendor_id" class="form-control">
						<option>请选择厂商...</option>
						@foreach($vendors as $vendor)
						<option value="{{$vendor['id']}}"  @if($vendor['id'] == $goods['vendor_id']) selected  @endif>{{$vendor['name']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >封面</label>
				<div class="col-md-2">
					<input type="file" name="cover">
				</div>
				<div class="col-md-5">
					@if($goods['cover'])
					<img src="{{url('storage/' . $goods['cover'])}}" height="30" width="30" />
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >库存</label>
				<div class="col-md-1">
					<input type="text" name="stock"  value="{{$goods['stock']}}" value="0"  class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >重量 </label>
				<div class="col-md-1">
					<input type="text" name="weight" value="{{$goods['weight']}}" class="form-control"  placeholder="">
				</div>
				<div class="col-md-1">
					<input type="text" name="weight_gross" value="{{$goods['weight_gross']}}" class="form-control"  placeholder="">
				</div>
				<span class ="title-desc">(净重/毛重)</span>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >成色</label>
				<div class="col-md-11">
					<label  class="radio-inline">
						<input type="radio" name="condition" @if($goods["condition"] == 10)checked  @endif id="inlineRadio2" value="10"> 全新
					</label>
					<label  class="radio-inline">
						<input type="radio" name="condition" @if($goods["condition"] == 9)checked  @endif id="inlineRadio3" value="9"> >=9成
					</label>
					<label  class="radio-inline">
						<input type="radio" name="condition" @if($goods["condition"] == 5)checked  @endif id="inlineRadio3" value="5"> >=5成
					</label>
					<label  class="radio-inline">
						<input type="radio" name="condition" @if($goods["condition"] == 2)checked  @endif id="inlineRadio3" value="2"> >=2成
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >价格 </label>
				<div class="col-md-2">
					<input type="text" name="price" value="{{$goods['price']}}" class="form-control"  placeholder="">
				</div>
				<div class="col-md-2">
					<input type="text" name="price_original" value="{{$goods['price_original']}}" class="form-control"  placeholder="">
				</div>
				<span class ="title-desc">(现价/原价)</span>
			</div>
			
			<div class="form-group">
				<label class='control-label col-md-1' >物流</label>
				<div class="col-md-5">
					<input type="text" name="logistics" value="{{$goods['logistics']}}"  class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >备注</label>
				<div class="col-md-5">
					<input type="text" name="note" value="{{$goods['note']}}" class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class='control-label col-md-1' >商品描述</label>
				<div class="col-md-11">
					<!-- 加载编辑器的容器 -->
					<script id="container" name="desc" type="text/plain">{!! htmlspecialchars_decode($goods['desc']) !!}</script>
				<!-- 实例化编辑器 -->
				<script type="text/javascript">
				var ue = UE.getEditor('container');
				</script>
				</div>
			</div>
			<div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit" class="btn btn-info ">提交</button>
                </div>
            </div>
		</form>
	</div>
</div>
@endsection