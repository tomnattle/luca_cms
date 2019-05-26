@extends('layouts.front')
@section('content')
<div class="jumbotron">
        <h1>开启免费企业建站之旅</h1>
        <p class="lead">手机、平板、PC、微信全面兼容 绑定顶级域名 一键QQ、多站点分享 让更多的客户找到您的网站，留住网站的来访客户，让更多的客户与您联系成为您的客户。</p>
        <p><a class="btn btn-lg btn-success" href="http://{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/home/sites" role="button">现在就开始</a></p>
      </div>
@endsection