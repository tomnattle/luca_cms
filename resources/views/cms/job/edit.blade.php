@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class="active"><a href="{{url('/home/jobs')}}">我的职位<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes-recieve')}}">简历<span class="sr-only">(current)</span></a></li>-->
	<li class=""><a href="{{url('/home/jobs/resumes')}}">我的简历<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes/apply')}}">已投职位<span class="sr-only">(current)</span></a></li>-->
</ul>
<div class="panel panel-default">
	<div class="panel-heading">
		<form action="{{url('/home/jobs')}}" method="GET">
			<div class="row">
				<div class="col-xs-3">
					<a href="{{url('/home/jobs')}}" type="button" class="btn btn-info">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					返回 </a>
				</div>
			</div>
		</form>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="{{url('/home/jobs/' . $job['id'])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="control-label col-md-1">职位名称</label>
				<div class="col-md-5">
					<input type="text" disabled name="name" class="form-control" value="{{$job['name']}}"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">部门名称</label>
				<div class="col-md-5">
					<input type="text" name="department" class="form-control" value="{{$job['department']}}"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">学历</label>
				<div class="col-md-4">
					<label class="radio-inline">
						<input @if($job['degree'] == 0) checked @endif type="radio" name="degree"id="dgr1" value="0"> 无要求
					</label>
					<label class="radio-inline">
						<input @if($job['degree'] == 1) checked @endif type="radio" name="degree" id="dgr2" value="1"> 高中＋
					</label>
					<label class="radio-inline">
						<input @if($job['degree'] == 2) checked @endif type="radio" name="degree" id="dgr3" value="2"> 大专＋
					</label>
					<label class="radio-inline">
						<input @if($job['degree'] == 3) checked @endif type="radio" name="degree" id="dgr3" value="3"> 本科＋
					</label>
					<label class="radio-inline">
						<input @if($job['degree'] == 4) checked @endif type="radio" name="degree" id="dgr4" value="4"> 硕士＋
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">工作经验</label>
				<div class="col-md-4">
					<label class="radio-inline">
						<input @if($job['experience'] == 0) checked @endif type="radio" name="experience" id="exp1" value="0"> 1-
					</label>
					<label class="radio-inline">
						<input @if($job['experience'] == 1) checked @endif type="radio" name="experience" id="exp2" value="1"> 1+
					</label>
					<label class="radio-inline">
						<input @if($job['experience'] == 2) checked @endif type="radio" name="experience" id="exp3" value="2"> 3+
					</label>
					<label class="radio-inline">
						<input @if($job['experience'] == 3) checked @endif type="radio" name="experience" id="exp4" value="3"> 5+
					</label>
					<label class="radio-inline">
						<input @if($job['experience'] == 4) checked @endif type="radio" name="experience" id="exp5" value="4"> 10+
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">薪酬 <span class="title-desc">(k)</span></label>
				<div class="col-md-1">
					<input type="text" name="salary_down" value="{{$job['salary_down']}}" class="form-control"  placeholder="">
				</div>
				<div class="col-md-1">
					<input type="text" name="salary_up" value="{{$job['salary_up']}}" class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">工作描述</label>
				<div class="col-md-11">
					<script id="container" name="desc" type="text/plain">{!! htmlspecialchars_decode($job['desc'])!!}</script>
					<!-- 实例化编辑器 -->
					<script type="text/javascript">
					var ue = UE.getEditor('container');
					</script>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
					<button type="submit" class="btn btn-info">提交</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection