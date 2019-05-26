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
		<form class="form-horizontal" action="{{url('/home/jobs')}}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="control-label col-md-1">职位名称</label>
				<div class="col-md-3">
					<input type="text" name="name" class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">部门名称</label>
				<div class="col-md-3">
					<input type="text" name="department"  style="width:200px"  class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">学历</label>
				<div class="col-md-4">
					<label class="radio-inline">
						<input type="radio" name="degree" checked id="dgr1" value="0"> 无要求
					</label>
					<label class="radio-inline">
						<input type="radio" name="degree" id="dgr2" value="1"> 高中＋
					</label>
					<label class="radio-inline">
						<input type="radio" name="degree" id="dgr3" value="2"> 大专＋
					</label>
					<label class="radio-inline">
						<input type="radio" name="degree" id="dgr3" value="3"> 本科＋
					</label>
					<label class="radio-inline">
						<input type="radio" name="degree" id="dgr4" value="4"> 硕士＋
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">工作经验</label>
				<div class="col-md-3">
					<label class="radio-inline">
						<input type="radio" name="experience" checked id="exp1" value="0"> 1-
					</label>
					<label class="radio-inline">
						<input type="radio" name="experience" id="exp2" value="1"> 1+
					</label>
					<label class="radio-inline">
						<input type="radio" name="experience" id="exp3" value="2"> 3+
					</label>
					<label class="radio-inline">
						<input type="radio" name="experience" id="exp4" value="3"> 5+
					</label>
					<label class="radio-inline">
						<input type="radio" name="experience" id="exp5" value="4"> 10+
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">薪酬 <span class="title-desc">(k)</span></label>
				<div class="col-md-1">
					<input type="text" name="salary_down" value="3" class="form-control"  placeholder="">
				</div>
				<div class="col-md-1">
					<input type="text" name="salary_up" value="5" class="form-control"  placeholder="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-1">工作描述</label>
				<div class="col-md-11">
					<label >工作描述</label>
					<!-- 加载编辑器的容器 -->
					<script id="container" name="desc" type="text/plain"></script>
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