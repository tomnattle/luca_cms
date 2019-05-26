@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class="active"><a href="{{url('/home/article-groups')}}">列表<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="javascript:history.back()" type="button" class="btn btn-info "><span
        class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
    </div>
    <div class="panel-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            警告：
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-horizontal" action="{{url('/home/article-groups')}}" method="POST" >
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-sm-1 control-label" >名称 <font color='red'>(*)</font></label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >类型 <font color='red'>(*)</font></label>
                <div class="col-sm-4">
                    <label class="radio-inline">
                        <input type="radio" name="model_type" checked="true" id="" value="1"> 文章
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="model_type" id="" value="2"> 图片
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="model_type" id="" value="3"> 商品
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >排序 <font color='red'>(*)</font></label>
                <div class="col-sm-4">
                    <input type="index" class="form-control" name="index" value="0">
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