@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class=""><a href="{{url('/home/jobs')}}">我的职位<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes-recieve')}}">简历<span class="sr-only">(current)</span></a></li>-->
	<li class="active"><a href="{{url('/home/jobs/resumes')}}">我的简历<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes/apply')}}">已投职位<span class="sr-only">(current)</span></a></li>-->
</ul>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-3">
				<a href="{{url('/home/jobs/resumes')}}" type="button" class="btn btn-info">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<ul id="myTabs" class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">简历</a></li>
				<li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">资料</a></li>
			</ul>
			<form class="form-horizontal" action="{{url('/home/jobs/resumes/' . $resume['id'])}}" method="POST" enctype="multipart/form-data">
				<div id="myTabContent"  class="tab-content" style="margin-top:20px;">
					<div role="tabpanel" class="tab-pane  fade active in" id="home" aria-labelledby="home-tab">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="control-label col-md-1" >简历名称</label>
							<div class="col-md-4">
								<input type="text" name="title" class="form-control" value="{{$resume['title']}}" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >公司名称</label>
							<div class="col-md-4">
								<input type="text" name="company" value="{{$resume['company']}}"  class="form-control"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >部门名称</label>
							<div class="col-md-4">
								<input type="text" name="department" value="{{$resume['department']}}"   class="form-control"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >技能</label>
							<div class="col-md-4">
								<input type="text" name="skill" value="{{$resume['skill']}}"  class="form-control"  placeholder="">
							</div>
							<span class="title-desc">(空格分割)</span>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >期待地点 <span class="title-desc"></span></label>
							<div class="col-md-4">
								<input type="text" name="address_expected" value="{{$resume['address_expected']}}"  class="form-control"  placeholder="">
								
							</div>
							<span class="title-desc">(空格分割)</span>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >关键词 </label>
							<div class="col-md-1">
								<select name="g_id" class="form-control" id="select_group_job">
									<option value="0">请选择分组</option>
									@foreach($groups as $group)
									<option value="{{$group['id']}}">{{$group['name']}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-1">
								<select name="c_id" class="form-control" id="select_cat_job">
								</select>
							</div>
							<div class="col-md-3">
								<input type="text" name="keywords" id="job-tags" class="form-control" value="{{$resume['keywords']}}"  placeholder="">
							</div>
							<span class="title-desc">(选择后可自行编辑，空格分割)</span>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >工作经验</label>
							<div class="col-md-3">
								<label class="radio-inline">
									<input @if($resume['experience'] == 0) checked @endif  type="radio" name="experience"  id="exp1" value="0"> 1-
								</label>
								<label class="radio-inline">
									<input @if($resume['experience'] == 1) checked @endif type="radio" name="experience" id="exp2" value="1"> 1+
								</label>
								<label class="radio-inline">
									<input @if($resume['experience'] == 2) checked @endif type="radio" name="experience" id="exp3" value="2"> 3+
								</label>
								<label class="radio-inline">
									<input @if($resume['experience'] == 3) checked @endif type="radio" name="experience" id="exp4" value="3"> 5+
								</label>
								<label class="radio-inline">
									<input @if($resume['exprience'] == 4) checked @endif type="radio" name="experience" id="exp5" value="4"> 10+
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >薪酬 <span class="title-desc">(k)</span></label>
							
							<div class="col-md-1">
								<input type="text" name="salary_down" value="{{$resume['salary_down']}}" class="form-control"  placeholder="">
							</div>
							<div class="col-md-1">
								<input type="text" name="salary_up" value="{{$resume['salary_up']}}" class="form-control"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >备注 <span class="title-desc"></span></label>
							<div class="col-md-4">
								<input type="text" name="note" value="{{$resume['note']}}"   class="form-control"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >工作经历</label>
							<div class="col-md-11">
								<!-- 加载编辑器的容器 -->
								<script id="container" name="desc" type="text/plain">{!!htmlspecialchars_decode($resume['desc'])!!}</script>
								<!-- 实例化编辑器 -->
								<script type="text/javascript">
								var ue = UE.getEditor('container');
								</script>
							</div>
						</div>
					</div>
					<div class="tab-pane " id="profile" aria-labelledby="profile-tab">
						<!--======================start profile=====================================-->
						<div class="form-group">
							<label class="control-label col-md-1">姓名</label>
							<div class="col-md-2">
								<input type="text" name="name" class="form-control" value="{{$resume['name']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">姓名 <span class="title-desc">(英文)</span></label>
							<div class="col-md-2">
								<input type="text" name="en_name" class="form-control" value="{{$resume['en_name']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">年龄</label>
							<div class="col-md-2">
								<input type="text" name="age" class="form-control" value="{{$resume['age']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">性别</label>
							<div class="col-md-2">
								<label class="radio-inline">
									<input @if($resume['sex'] == 0) checked @endif type="radio" name="sex"id="dgr1" value="0"> 女
								</label>
								<label class="radio-inline">
									<input @if($resume['sex'] == 1) checked @endif type="radio" name="sex" id="dgr2" value="1"> 男
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">婚姻</label>
							<div class="col-md-2">
								<label class="radio-inline">
									<input @if($resume['marry'] == 0) checked @endif type="radio" name="marry"id="dgr1" value="0"> 未
								</label>
								<label class="radio-inline">
									<input @if($resume['marry'] == 1) checked @endif type="radio" name="marry" id="dgr2" value="1"> 已
								</label>
							</div>
							
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">住址</label>
							<div class="col-md-5">
								<input type="text" name="address" class="form-control" value="{{$resume['address']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">邮箱</label>
							<div class="col-md-2">
								<input type="text" name="mail" class="form-control" value="{{$resume['mail']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">微信</label>
							<div class="col-md-2">
								<input type="text" name="weixin" class="form-control" value="{{$resume['weixin']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">电话</label>
							<div class="col-md-2">
								<input type="text" name="phone" class="form-control" value="{{$resume['phone']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">语言</label>
							<div class="col-md-2">
								<input type="text" name="language" class="form-control" value="{{$resume['language']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">学校</label>
							<div class="col-md-4">
								<input type="text" name="school" class="form-control" value="{{$resume['school']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">专业</label>
							<div class="col-md-3">
								<input type="text" name="major" class="form-control" value="{{$resume['major']}}"  placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1" >学历</label>
							<div class="col-md-4">
								<label class="radio-inline">
									<input @if($resume['degree'] == 0) checked @endif type="radio" name="degree"id="dgr1" value="0"> 无要求
								</label>
								<label class="radio-inline">
									<input @if($resume['degree'] == 1) checked @endif type="radio" name="degree" id="dgr2" value="1"> 高中＋
								</label>
								<label class="radio-inline">
									<input @if($resume['degree'] == 2) checked @endif type="radio" name="degree" id="dgr3" value="2"> 大专＋
								</label>
								<label class="radio-inline">
									<input @if($resume['degree'] == 3) checked @endif type="radio" name="degree" id="dgr3" value="3"> 本科＋
								</label>
								<label class="radio-inline">
									<input @if($resume['degree'] == 4) checked @endif type="radio" name="degree" id="dgr4" value="4"> 硕士＋
								</label>
							</div>
						</div>
						<!--======================end profile=====================================-->
					</div>
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-10">
							<button type="submit" class="btn btn-info">提交</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endsection