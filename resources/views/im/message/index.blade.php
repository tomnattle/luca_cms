@extends('layouts.im')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="">好友<span class="sr-only">(current)</span></a></li>
  <li class=""><a href="">系统<span class="sr-only">(current)</span></a></li>
</ul>


<div class="panel panel-default">
    <div class="panel-body">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img src="/images/header.png" alt="..." class="media-object header">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading" style="font-size: 16px;">胡伟</h4>
                <span>2017-12-26 16:59:04</span>
            </div>
        </div>
        <div class="blog-item"> 
            韩磊，你好，我是你的同学胡伟。
        </div>
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-success btn-xs">同意</button>
        <button type="button" class="btn btn-danger btn-xs">拒绝</button>
        <button type="button" class="btn btn-info btn-xs">忽略</button>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img src="/images/header.png" alt="..." class="media-object header">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading" style="font-size: 16px;">胡伟</h4>
                <span>2017-12-26 16:59:04</span>
            </div>
        </div>
        <div class="blog-item"> 
            韩磊，你好，我是你的同学胡伟。
        </div>
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-success btn-xs">同意</button>
        <button type="button" class="btn btn-danger btn-xs">拒绝</button>
        <button type="button" class="btn btn-info btn-xs">忽略</button>
    </div>
</div>
@endsection