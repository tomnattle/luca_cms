@extends('layouts.cms')
@section('content')
 
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/templates')}}">列表<span class="sr-only">(current)</span></a></li>
  <li class=""><a href="{{url('/home/sites/config')}}">设置<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      @foreach($templates as $template)
      @if($site['tpl_id'] == $template['id'])
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="thumbnail active">
          <img src="/images/tpl/{{ $template['id'] }}.jpg" style="height:184px;" alt="...">
          <div class="caption" style="height: 40px;">
            <span><a target="_blank" href="http://{{$site['en_name']}}.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}" d="view_tpl" data-id='{{ $template['id'] }}' class="btn btn-success btn-xs pull-right" style="margin-top: 0px;" role="button">预览</a></span>
            <span><a href="/home/sites/config" class="btn btn-info btn-xs pull-right" style="margin-top: 0px; margin-right: 5px;" role="button" >设置</a></span>
            <span class="pull-left">{{ $template['name'] }}</span>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="thumbnail">
          <img src="/images/tpl/{{ $template['id'] }}.jpg" style="height:184px;" alt="...">
          <div class="caption" style="height: 40px;">
            <span><a href="javascript:void(0);" class="btn btn-default btn-xs pull-right" style="margin-top: 0px;" role="button" id="select_tpl" data-id='{{ $template['id'] }}'>使用</a></span>
            <span>{{ $template['name'] }}</span>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
  @endsection