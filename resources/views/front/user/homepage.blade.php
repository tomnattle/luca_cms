@extends('layouts.front')
@section('content')
<div class="front-user">
    <div class="top-bg"></div>
    <div class="top-title">
        <button class="btn btn-primary pull-right fellow"> <span class="fa fa-plus" ></span> 关注</button>
        <button class="btn btn-primary pull-right fellow"> <span class="fa fa-comments-o" ></span> 私信</button>
        <span>{{ $user->nick }}</span>
        <a href="{{ env('APP_URL') }}/users/{{ ($user->u_id) }}">
            @if($user['user_icon'] != '')
            <img  class="media-object img-circle" src="{{url('storage/' . $user->icon)}}" alt="...">
            @else
            <img  class="media-object img-circle" src="/images/header.png" alt="...">
            @endif
        </a>
        <p style="font-size: 14px; color: #666;">
            @if(strlen($user->use_signature) > 0)
            {{str_limit($user->use_signature, $limit = 40, $end = '...')}}
            @else
            暂无签名
            @endif
        </p>
    </div>
    <div class="main">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">文章</div>
                    <div class="panel-body">
                         
<h3><a href="">杨伟民：增速提高或降低没必要大惊小怪，也没必要惊慌失措</a></h3>
32阅读 ⋅ 0评论 ⋅ 2018-03-08 15:30
<br>
 
<h3><a href="">线下数据大揭秘：女孩子的钱都花到哪里去了？</a></h3>
9阅读 ⋅ 0评论 ⋅ 2018-03-08 15:55

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">关注：100 </div>
                            <div class="col-md-6">粉丝：100 </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">热门文章</div>
                    <div class="panel-body">
                         
<a href="">宁高宁谈“品质革命”：中国制造业已经悄悄地在起步了！</a>
47阅读
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection