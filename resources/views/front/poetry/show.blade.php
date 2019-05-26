@extends('layouts.poetry')
@section('title') 诗词.{{ config('app.name', 'fanbai') }} 诗词 歌词 文章 故事 诗人 作者  @endsection
@section('keywords') {{ $poetry['name'] }} @endsection
@section('description') {{ $poetry['name'] }}是{{ $poetry['age'] }}诗人{{ $poetry['author'] }}写的一首诗词 @endsection
@section('name')
诗词
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="http://{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">泛白网</a></li>
            <li><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/poetries">诗词</a></li>
            <li class="active">诗词</li>
        </ol>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">内容</div>
            <div class="panel-body">
                <h4>{{ $poetry['name'] }}</h4>
                <p>
                    {!! $poetry['content'] !!}
                </p>
            </div>
            <div class="panel-footer">
                作者:{{ $poetry['author']}}  年代:{{ $poetry['age'] }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <span style="cursor: pointer;" data-comment-id="0" data-kind-id="2" class="btn-mark fa fa-thumbs-o-down pull-right">{{ $poetry['dislike_count'] }}</span>
                <span style="cursor: pointer;" data-comment-id="0" data-kind-id="1" class="btn-mark fa fa-thumbs-o-up pull-right" >{{ $poetry['like_count'] }}</span>
                <span class="fa fa-eye pull-right"> {{ $poetry['view_count'] }}</span>
                <span class="fa fa-commenting pull-right"> {{ $poetry['comment_count'] }}</span>
                
            </div>
        </div>
        @include('front.common.comment', [
        'target_id' => $poetry['id'],
        'user' => $user,
        'site_id' => 0,
        'func_id' => 'poetry.poetry',
        'page_size' => 10,
        'comments' => $comments
        ])
    </div>
    <div class="col-md-3 right-side">
        <button type="button" class="btn btn-success btn-write">我要发表</button>
    </div>
</div>
@include('front.common.login')
@endsection