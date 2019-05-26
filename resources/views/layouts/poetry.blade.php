<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name=”Keywords” Content="@yield('keywords')">
    <meta name=”Description” Content="@yield('description')">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
       (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5920743693362167",
            enable_page_level_ads: true
       });
  </script>
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
  </head>
  <body>
    <div class="container potry">
      <div class="main-body">
        <div class="masthead header">
          <div class="bar-right">
            @include('layouts.user_bar')
          </div>
          <div class="logo">
            <a href='http://{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}'>
              <img title='fanbai123.cn' src="/images/logo.png"><font  >@yield('name')</font>{{ config('app.name', 'fanbai') }}
            </a>
          </div>
          <nav>
            <ul class="nav">
              <li class="@if(!empty($active['site'])) {{ $active['site']}} @endif pull-left"><a href="http://{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">首页</a></li>
              <li class="@if(!empty($active['poetry'])) {{ $active['poetry']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/poetries">诗词</a></li>
              <!--
              <li class="@if(!empty($active['lyric'])) {{ $active['lyric']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/lyrics">歌词</a></li>-->
              <!--
              <li class="@if(!empty($active['article'])) {{ $active['article']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/articles">散文</a></li>
              <li class="@if(!empty($active['story'])) {{ $active['story']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/story">故事</a></li>
              <li class="@if(!empty($active['riddle'])) {{ $active['riddle']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/riddles">谜语</a></li>
              <li class="@if(!empty($active['author'])) {{ $active['author']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/authors">作者</a></li>-->
            </ul>
          </nav>
        </div>
        <div class="top-bg"></div>
        @yield('content')
        <footer class="footer">
          <p>&copy; 2016 fanbai123.cn 作者：泛白の绿</p>
        </footer>
      </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/encrypt.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('js/jquery.citys.js') }}"></script>
    <script src="{{ asset('js/mustache.min.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/popover.js') }}"></script>
    <script src="{{ asset('js/http.js') }}"></script>
    <script src="{{ asset('js/user.js') }}"></script>
    <script src="{{ asset('js/comment.js') }}"></script>
  </body>
</html>