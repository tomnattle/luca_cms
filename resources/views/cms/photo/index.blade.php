@extends('layouts.cms')
@section('content')

<ul class="context-nav">
  <li class="active"><a href="{{url('/home/albums')}}">相册<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="{{url('/home/albums')}}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
    <a href="{{url('home/photos/create' )}}" type="button" class="btn btn-info">
      上传 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
    </div>
    <div class="panel-body photo">

      <div class="row">
          @foreach ($photos as $photo)
          <div class="col-md-3">
            <div class="thumbnail">
              <div class="img-box">
              @if($photo['file'])
              <img onload="resize(this)" src="{{URL::asset('storage/' .$photo['file'])}}" alt="..."  />
              @else
              <img src="{{URL::asset('/images/default.png')}}" alt="..." />
              @endif
              </div>
              <div class="caption clearfix">
                <a data-id="{{$photo['pid']}}" class="bt_set_album_cover btn btn-default btn-xs pull-right" style="margin-top: 0px; margin-right: 0px;" role="button">设置为封面</a>
                <a href="javascript:void(0)"  class=" btn btn-danger btn-xs pull-right bt_del_photo" data-id="{{$photo['pid']}}" style="margin-top: 0px; margin-right: 5px;" role="button">删除</a>
                <p class="pull-left">@if($photo['name'])
                  {{str_limit($photo['name'], 12, '...')}}
                  @else
                  未命名
                @endif</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {!! $photos->links() !!}
      </div>
    </div>
    @endsection