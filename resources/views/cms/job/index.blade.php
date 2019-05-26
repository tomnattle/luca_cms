@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class="active"><a href="{{url('/home/jobs')}}">我的职位<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes-recieve')}}">简历<span class="sr-only">(current)</span></a></li>-->
	<li class=""><a href="{{url('/home/jobs/resumes')}}">我的简历<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes/apply')}}">已投职位<span class="sr-only">(current)</span></a></li>-->
</ul>
<form action="{{url('/home/jobs/state')}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="page" value="{{Request()->input('page', 1)}}">
	<input type="hidden" name="is_show" value="{{Request()->input('is_show', -1)}}">
	<div class="panel panel-default">
		<div class="panel-heading">
				<div class="row">
					<div class="col-xs-7">
						<a href="{{url('/home/jobs/create')}}" type="button" class="btn btn-info">
							新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
						</div>
						<div class="col-xs-2">
							<input type="submit" name="state"  class="btn btn-danger" value="下线">
							<input type="submit" name="state" class="btn btn-success" value="上线">
						</div>
						<div class="col-xs-3">
							<select class="form-control" onchange="window.location.href='?is_show='+this.value" name="is_show" >
								<option value="-1" @if($is_show===-1) selected @endif>全部</option>
								<option value="1" @if($is_show===1) selected @endif>发布中</option>
								<option value="0" @if($is_show===0) selected @endif>已关闭</option>
							</select>
						</div>
						
					</div>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered _list">
					<tr>
						<th class="" width=20></th>
						<th class="" width=50>状态</th>
						<th class="">名称</th>
						<th class="">热度<span style="font-size:10px;font-weight:normal">(喜欢/收藏/评论)</span></th>
						<th class="">浏览量<span style="font-size:10px;font-weight:normal">(今日/全部)</span></th>
						<th class="">简历<span style="font-size:10px;font-weight:normal">(未读/全部)</span></th>
						<th class="" width="90">更新时间</th>
					</tr>
					@foreach($jobs as $job)
					<tr>
						<td class="">
							<label>
								<input name="ids[]" value="{{$job['id']}}" type="checkbox">
							</label>
						</td>
						<td class=""><?php if($job['is_show']==1){echo '在线';}else{echo '下线';};?></td>
						<td class=""><a href="/home/jobs/{{$job['id']}}/edit">{{$job['name']}}</a></td>
						<td class="">
							<a href="#"><span class='glyphicon glyphicon-thumbs-up'></span> <span class="badge"></span> <span class="badge">{{$job['like_count']}}</span></a>
							<a href="#"><span class='glyphicon glyphicon-star-empty'></span> <span class="badge"></span> <span class="badge">{{$job['store_count']}}</span></a>
							<a href="#"><span class='glyphicon glyphicon-comment'></span> <span class="badge"></span> <span class="badge">{{$job['comment_count']}}</span></a>

						</td>
						<td class="">{{$job['view_count_today']}}/{{$job['view_count']}}</td>
						<td class="">{{$job['resume_count_unread']}}/{{$job['resume_count']}}</td>
						<td class="" width="90">{{date('Y-m-d', strtotime($job['updated_at']))}}</td>
					</tr>
					@endforeach
				</table>
				{!!$jobs->links()!!}
			</div>
		</div>
	</form>
	@endsection
