@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/albums')}}">相册<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-md-9">
        <a href="{{url('/home/photos/create')}}" type="button" class="btn btn-info">
          上传 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
          <a href="{{url('/home/albums/create')}}" type="button" class="btn btn-info">
            新增相册 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
          </div>
          <div class="col-md-3">
            <select name="g_id" class="form-control" id ="select_group_album_reload" >
              <option value="0">全部分类</option>
              @foreach($groups as $group)
              <option value="{{$group['id']}}"
                @if($group['id'] == $g_id)
                selected="selected"
                @endif
              >{{$group['name']}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <div class="row album">
          @foreach ($albums as $album)
          <div class="col-md-3">
            <div class="thumbnail">
              <div class="img-box">
              @if($album['cover'])
              <img src="{{URL::asset('storage/' .$album['cover'])}}" alt="..."  />
              @else
              <img src="{{URL::asset('/images/default.png')}}" alt="..." />
              @endif
              </div>
              <div class="caption clearfix">
                <a href="/home/sites/1/admin" data-id="{{$album['id']}}" class="bt_del_album btn btn-danger btn-xs pull-right" style="margin-top: 0px; margin-right: 5px;" role="button">删除</a>
                <a href="/home/albums/{{$album['id']}}/edit" class="btn btn-default btn-xs pull-right" style="margin-top: 0px; margin-right: 5px;" role="button">编辑</a>
                <a href="{{url('home/photos?a_id='. $album['id'])}}" class="btn btn-info btn-xs pull-right" style="margin-top: 0px; margin-right: 5px;" role="button">浏览</a>
                <p class="pull-left">@if($album['name'])
                  {{str_limit($album['name'], 12, '...')}}
                  @else
                  未命名
                @endif</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {!! $albums->links() !!}
      </div>
    </div>
    @endsection