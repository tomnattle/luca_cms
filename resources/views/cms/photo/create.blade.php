@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/albums')}}">相册<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="{{url('home/albums')}}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{url('/home/photos')}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label class="control-label col-md-1" >分组</label>
        <div class="col-md-2">
          <select name="g_id" class="form-control" id="select_group_album">
            <option value="0">默认</option>
            @foreach($groups as $group)
            <option value="{{$group['id']}}">{{$group['name']}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <select name="a_id" class="form-control" id="select_cat_album">
            <option value="0">请选择相册</option>
            @foreach($albums as $album)
            <option value="{{$album['id']}}">{{$album['name']}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1" >标题</label>
        <div class="col-md-2">
          <input type="text"  name="name" class="form-control"  placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1" >图片</label>
        <div class="col-md-2">
          <input type="file"  name="file">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1" >描述</label>
        <div class="col-md-4">
          <textarea name="desc" class="form-control" rows="3" ></textarea>
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