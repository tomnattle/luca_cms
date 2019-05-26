@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class=""><a href="{{url('/home/goods')}}">商品<span class="sr-only">(current)</span></a></li>
    <li class=""><a href="{{url('/home/goods/cats')}}">分组<span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="{{url('/home/goods/vendors')}}">厂商<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="javascript:history.back()" type="button" class="btn btn-info"><span
        class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="{{url('/home/goods/vendors')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-sm-1 control-label">公司代码</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="code" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">名称</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">排序</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="index" value="0">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-1 control-label">封面</label>
                <div class="col-sm-2">
                    <input type="file" name="cover">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">地址</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="address" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">简介</label>
                <div class="col-sm-6">
                    <textarea name="desc" class="form-control"  rows=3 ></textarea>
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