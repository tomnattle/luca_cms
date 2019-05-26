@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/articles')}}">文章<span class="sr-only">(current)</span></a></li>
  <li><a href="{{url('/home/article-cats')}}">分类</a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="{{url('home/articles')}}" type="button" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{url('/home/articles')}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="form-group">
        <label class="col-sm-1 control-label" >分组 <font color='red'>(*)</font></label>
        <div class="col-sm-2">
          <select name="g_id" class="form-control" id="select_group">
            <option value="0">默认</option>
            @foreach($groups as $group)
            <option value="{{$group['id']}}">{{$group['name']}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <select name="c_id" class="form-control" id="select_cat">
            <option value="0">默认</option>
          </select>
        </div>
      </div>
      <div class="form-group" id="cities">
        <label class="col-sm-1 control-label" >地点 <font color='red'></font></label>
        <div class="col-md-2">
          <select class="form-control" name="province">
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" name="city">
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" name="area">
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" name="town">
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label" >标题 <font color='red'>(*)</font></label>
        <div class="col-sm-4">
          <input type="text" name="title" class="form-control"  placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label" >副标 <font color='red'>(*)</font></label>
        <div class="col-sm-4">
          <input type="text" name="extra[sub-title]" class="form-control"  placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label" >封面 <font color='red'>(*)</font></label>
        <div class="col-sm-11">
          <label >内容</label>
          <!-- 加载编辑器的容器 -->
          <script id="container" name="context" type="text/plain"></script>
          <!-- 实例化编辑器 -->
          <script type="text/javascript">
          var ue = UE.getEditor('container');
            ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
          });
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