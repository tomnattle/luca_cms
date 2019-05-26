@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/albums')}}">相册<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="javascript:history.back()" type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{url('/home/albums/' . $album['id'])}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label class="control-label col-md-1" >分组</label>
        <div class="col-md-2">
          <select name="g_id" class="form-control" id="select_group">
            <option value="0">默认</option>
            @foreach($groups as $group)
            <option
              @if($group['id'] == $album['g_id'])
              selected="selected"
              @endif
            value="{{$group['id']}}">{{$group['name']}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1" >名称</label>
        <div class="col-md-2">
          <input type="text" value="{{$album['name']}}" name="name" class="form-control"  placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1" >排序</label>
        <div class="col-md-2">
          <input type="index" value="{{$album['index']}}" class="form-control" name="index" value="0">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1" >封面</label>
        <div class="col-md-2">
          <input type="file" name="cover">
        </div>
        <div class="col-md-2">
          @if($album['cover'])
          <img src="{{url('storage/' . $album['cover'])}}" height="82" width="82" />
          @endif
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