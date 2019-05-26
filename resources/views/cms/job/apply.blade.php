@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class=""><a href="{{url('/home/jobs')}}">我的职位<span class="sr-only">(current)</span></a></li>
	<!--<li class=""><a href="{{url('/home/jobs/resumes-recieve')}}">简历<span class="sr-only">(current)</span></a></li>-->
	<li class=""><a href="{{url('/home/jobs/resumes')}}">我的简历<span class="sr-only">(current)</span></a></li>
	<!--<li class="active"><a href="{{url('/home/jobs/resumes/apply')}}">已投职位<span class="sr-only">(current)</span></a></li>-->
</ul>
<form action="{{url('/home/jobs/state')}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="page" value="{{Request()->input('page', 1)}}">
	<input type="hidden" name="is_show" value="{{Request()->input('is_show', -1)}}">
	<div class="panel panel-default">
		<div class="panel-heading">
		</div>
		<div class="panel-body">
		</div>
	</div>
</form>
@endsection