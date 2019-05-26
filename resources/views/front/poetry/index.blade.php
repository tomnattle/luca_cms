@extends('layouts.poetry')
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
        <div class="panel panel-default search-bar">
            <div class="panel-heading">搜索</div>
            <div class="panel-body">
                <form method="get"  action="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/poetries">
                    <div class="input-group"  >
                        <input type="text" name='keywords' class="form-control" placeholder="请输入关键词">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">搜索</button>
                        </span>
                    </div>
                </form>
                <ul class="clearfix">
                    <li >时代</li>
                    @foreach(Config('age') as $id => $name)
                    <li ><a href="/poetries/ages/{{ $name }}">{{ $name }}</a></li>
                    @endforeach
                </ul>
                @if(!empty($search))
                <div class="well">
                    @if(isset($search['age'])) 时代: <span class="">{{ $search['age'] }}</span><a href="/poetries"><span class="glyphicon glyphicon-remove btn btn-xs" ></span></a> @endif
                    @if(isset($search['tag'])) 标签: <span class="">{{ $search['tag'] }}</span><span class="glyphicon glyphicon-remove btn btn-xs" ></span>@endif
                    @if(isset($search['author'])) 作者: <span class="">{{ $search['author'] }}</span><span class="glyphicon glyphicon-remove btn btn-xs" ></span>@endif
                    @if(isset($search['keywords'])) 关键词: <span class="">{{ $search['keywords'] }}</span><a href="/poetries"><span class="glyphicon glyphicon-remove btn btn-xs" ></span></a>@endif
                </div>
                @endif
            </div>
        </div>
        <div class="article-list">
            @foreach($poetries as  $poetry)
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><a href="/poetries/{{ Hashids::encode($poetry['id']) }}">{{ $poetry['name'] }}</a></h4>
                    {{str_limit(str_replace('　', '', strip_tags($poetry['content'])), $limit = 180, $end = '...')}}
                </div>
                <div class="media-footer">
                    <span class="pull-left">作者：<a href="/poetries/authors/{{ $poetry['author'] }}">{{ $poetry['author'] }}</a> 年代：<a href="/poetries/ages/{{ $poetry['age'] }}">{{ $poetry['age'] }}</a></span>
                    <a href="/poetries/{{ Hashids::encode($poetry['id']) }}">
                        <span class="fa fa-thumbs-down pull-right"> {{ $poetry['dislike_count'] }}</span>
                        <span class="fa fa-thumbs-up pull-right"> {{ $poetry['like_count'] }}</span>
                        <span class="fa fa-eye pull-right"> {{ $poetry['view_count'] }}</span>
                        <span class="fa fa-commenting pull-right"> {{ $poetry['comment_count'] }}</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @if(!empty($search))
        {!! $poetries->links() !!}
        @endif
    </div>
    <div class="col-md-3 right-side">
        <button type="button" class="btn btn-success btn-write">我要发表</button>
        @if($author)
        <div class="thumbnail">
          <img src="/images/poetry.jpg" width="100%" alt="...">
          <div class="caption">
            <h4>{{ $author['name'] }}</h4>
            <p>{{str_limit(strip_tags($poetry['desc']), $limit = 180, $end = '...')}}</p>
            <p>
                <a href="/authors/{{ Hashids::encode($author['id']) }}" class="btn btn-primary btn-xs" role="button">查看作者</a>
            </p>
          </div>
        </div>
        @else
        <!--
        <a href="#" class="thumbnail">
          <img src="/images/poetry.jpg" width="100%" alt="...">
        </a>
    -->
        @endif
        <!--
        <div class="panel panel-default">
            <div class="panel-heading">最新诗词</div>
            <div class="panel-body">
                <a href="">积雨辋川庄作 </a><br>
                <a href="">山中 </a><br>
                <a href="">渭川田家 </a><br>
                <a href="">辛夷坞 </a><br>
                <a href="">终南别业 </a>
            </div>
        </div>
        -->
    </div>
</div>
@endsection