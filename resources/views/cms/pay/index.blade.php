@extends('layouts.cms')
@section('content')
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="{{url('/home/pays')}}">支付<span class="sr-only">(current)</span></a></li>
			<!--<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="#">Action</a></li>
		</ul>
	</li>-->
</ul>
</div>
</nav>

<div class="panel panel-default">
	<div class="panel-heading">
		<form action="{{url('/home/articles')}}" method="GET">
			<div class="row">
				<div class="col-xs-3">
					<a href="{{url('/home/pays/create')}}" type="button" class="btn btn-info">
						新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-3">
						<select class="form-control">
							<option>全部</option>
							<option>开启中</option>
							<option>关闭中</option>
						</select>
					</div>
					<div class="col-xs-3">
						<a href="{{url('/home/pays/create')}}" type="button" class="btn">关闭</a>
						<a href="{{url('/home/pays/create')}}" type="button" class="btn btn-info">开启</a>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered _list">
				<tr>
					<th class="" width=20></th>
					<th class="" width=50>状态</th>
					<th class="">名称</th>
					<th class="">使用量</th>
					<th class="" width="90">更新时间</th>
				</tr>
				<tr>
					<td class="">
						<label>
							<input type="checkbox">
						</label>
					</td>
					<td class="">开启</td>
					<td class=""><a href="/home/pays/1">支付宝</a></td>
					<td class="">15</td>
					<td class="" width="90">2017-12-06</td>
				</tr>

			</table>
		</div>
	</div>
	@endsection
