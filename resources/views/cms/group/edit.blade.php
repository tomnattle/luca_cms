@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class="active"><a href="{{url('/home/article-groups')}}">列表<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="javascript:history.back()" type="button" class="btn btn-info "><span
        class="glyphicon glyphicon-chevron-left" aria-hidden></span> 返回</a>
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
        <form class="form-horizontal" action="{{url('/home/article-groups/' . $group['id'])}}" method="POST" >
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-sm-1 control-label" >名称 <font color='red'>(*)</font></span></label>
                <div class="col-sm-3">
                    <input type="text" name="name" class="form-control" value="{{ $group['name'] }}" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >类型 <font color='red'>(*)</font></span></label>
                <div class="col-sm-3">
                    <label class="radio-inline">
                        <input type="radio" name="model_type" @if($group['model_type']==1) checked @endif id="inlineRadio1" value="1"> 文章
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="model_type" @if($group['model_type']==2) checked @endif id="inlineRadio2" value="2"> 图片
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="model_type" @if($group['model_type']==3) checked @endif id="inlineRadio2" value="3"> 商品
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" > <font color='red'>(*)</font></span></label>
                <div class="col-sm-3">
                    <input type="index" class="form-control" name="index" value="{{ $group['index'] }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" > </label>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-info">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection