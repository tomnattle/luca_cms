@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li ><a href="{{url('/home/articles')}}">文章</a></li>
  <li class="active"><a href="{{url('/home/article-cats')}}">分类<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="{{url('/home/article-cats?g_id=' . $articleCat['g_id'])}}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{url('/home/article-cats/' . $articleCat['id'])}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label class="col-sm-1 control-label" >名称</label>
        <div class="col-xs-2">
          <input type="text" name="name" class="form-control"  placeholder="" value="{{$articleCat['name']}}">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-1 control-label">排序</label>
        <div class="row">
          <div class="col-xs-1">
            <input type="index" class="form-control" name="index" value="{{$articleCat['index']}}">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-1 control-label">封面</label>
        <div class="col-xs-2">
          <input type="file" name="cover">
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