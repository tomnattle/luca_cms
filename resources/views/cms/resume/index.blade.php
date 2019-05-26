@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class=""><a href="{{url('/home/jobs')}}">我的职位<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes-recieve')}}">简历<span class="sr-only">(current)</span></a></li>-->
	<li class="active"><a href="{{url('/home/jobs/resumes')}}">我的简历<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes/apply')}}">已投职位<span class="sr-only">(current)</span></a></li>-->
</ul>
<form action="{{url('/home/jobs/resumes/state')}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="page" value="{{Request()->input('page', 1)}}">
	<input type="hidden" name="is_show" value="{{Request()->input('is_show', -1)}}">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-3">
					<a href="{{url('/home/jobs/resumes/create')}}" type="button" class="btn btn-info">
						新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
					</div>
					<div class="col-xs-3">
						<select class="form-control" onchange="window.location.href='?is_show='+this.value" name="is_show" >
							<option value="-1" @if($is_show===-1) selected @endif>全部</option>
							<option value="1" @if($is_show===1) selected @endif>已关闭</option>
							<option value="0" @if($is_show===0) selected @endif>已展示</option>
						</select>
					</div>
					<div class="col-xs-3">
						<input type="submit" name="state"  class="btn" value="关闭">
						<input type="submit" name="state" class="btn btn-info" value="展示">
					</div>
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered _list">
					<tr>
						<th class="" width=20></th>
						<th class="" width=50>状态</th>
						<th class="">标题</th>
						<th class="">浏览量<span style="font-size:10px;font-weight:normal">(今日/全部)</span></th>
						<th class="">约面<span style="font-size:10px;font-weight:normal">(未读/全部)</span></th>
						<th class="">投递<span style="font-size:10px;font-weight:normal">(查看/全部)</span></th>
						<th class="" width="90">更新时间</th>
					</tr>
					@foreach($resumes as $resume)
					<tr>
						<td class="">
							<label>
								<input name="ids[]" value="{{$resume['id']}}" type="checkbox">
							</label>
						</td>
						<td class=""><?php if($resume['is_show']==1){echo '展示';}else{echo '关闭';};?></td>
						<td class=""><a href="/home/jobs/resumes/{{$resume['id']}}/edit">{{$resume['title']}}</a></td>
						<td class="">{{$resume['view_count_today']}}/{{$resume['view_count']}}</td>
						<td class="">{{$resume['interview_count_today']}}/{{$resume['interview_count']}}</td>
						<td class="">{{$resume['read_count']}}/{{$resume['apply_count']}}</td>
						<td class="">{{date('Y-m-d', strtotime($resume['updated_at']))}}</td>
					</tr>
					@endforeach
				</table>
				{!!$resumes->links()!!}
			</div>
		</div>
	</div>
</form>
@endsection