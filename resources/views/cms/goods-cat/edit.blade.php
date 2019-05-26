@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class=""><a href="{{url('/home/goods')}}">商品<span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="{{url('/home/goods/cats')}}">分组<span class="sr-only">(current)</span></a></li>
    <li class=""><a href="{{url('/home/goods/vendors')}}">厂商<span class="sr-only">(current)</span></a></li>
    <!--<li class=""><a href="{{url('/home/goods/attrs')}}">参数<span class="sr-only">(current)</span></a></li>-->
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="javascript:history.back()" type="button" class="btn btn-info"><span
        class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="{{url('/home/goods/cats/' . $cat['id'])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                    <label class="col-sm-1 control-label" >名称</label>
                <div class="col-xs-2">
                    <input type="text" name="name" value="{{$cat['name']}}" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >排序</label>
                <div class="col-xs-2">
                    <input type="index" value="{{$cat['index']}}" class="form-control" name="index" value="0">
                </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-1 control-label" >封面</label>
                <div class="col-md-3">
                    <input type="file"  name="cover">
                </div>
                <div class="col-md-5">
                    @if($cat['cover'])
                    <img src="{{url('storage/' . $cat['cover'])}}" height="30" width="30" />
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