<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('js/cms.js') }}"></script>
        @include('UEditor::head')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-fixed-top top-nav">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            退出
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container main-container">
                
                <?php $active['site'] = 'active'; ?>
                @include('layouts.menu')
                
                <div class="panel panel-default right-context clearfix" >
                    <ol class="breadcrumb site-breadcrumb">
                        <li ><a href="/home/sites">站点</a></li>
                        <li class="active">{{ Request::user()->getSite()['en_name']}}.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}</a><span style="font-size:10px;"><!-- &lt; {{Request()->user()->getSite()['desc']}}&gt;--></li>
                    </ol>
                    <div class="panel-body ">
                        <div class="list-group sidebar2">
                            <a href="{{url('home/sites/admin')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">首页</a>
                            <!--<a href="{{url('home/blogs')}}" class="list-group-item {{isset($active['blog']) ? $active['blog'] : ''}}">博客</a>-->
                            <a href="{{url('home/article-groups')}}" class="list-group-item {{isset($active['group']) ? $active['group'] : ''}}">栏目</a>
                            <a href="{{url('home/articles')}}" class="list-group-item {{isset($active['article']) ? $active['article'] : ''}}">文章</a>
                            <a href="{{url('home/albums')}}" class="list-group-item {{isset($active['album']) ? $active['album'] : ''}}">相册</a>
                            <a href="{{url('home/jobs')}}" class="list-group-item {{isset($active['job']) ? $active['job'] : ''}}">招聘</a>
                            <a href="{{url('home/goods')}}" class="list-group-item {{isset($active['goods']) ? $active['goods'] : ''}}">商品</a>
                            <a href="{{url('home/orders')}}" class="list-group-item {{isset($active['order']) ? $active['order'] : ''}}">订单</a>
                            <a href="{{url('home/templates')}}" class="list-group-item {{isset($active['template']) ? $active['template'] : ''}}">模版</a>
                            <a href="{{url('home/companies/config')}}" class="list-group-item {{isset($active['company']) ? $active['company'] : ''}}">设置</a>
                            <!--<a href="{{url('home/reports')}}" class="list-group-item {{isset($active['report']) ? $active['report'] : ''}}">报告</a>-->
                        </div>
                        <div class="right-context2">
                            
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade bs-example-modal-sm" id = "myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">提示</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/toastr.min.js') }}"></script>
            <script src="{{ asset('js/jquery.cookie.js') }}"></script>
            <script src="{{ asset('js/jquery.citys.js') }}"></script>
            <script src="{{ asset('js/mustache.min.js') }}"></script>
            <script src="{{ asset('js/tooltip.js') }}"></script>
            <script src="{{ asset('js/popover.js') }}"></script>
            <script src="{{ asset('js/http.js') }}"></script>
            <script src="{{ asset('js/data.js') }}"></script>
            <!-- Scripts -->
            
            <script src="{{ asset('js/city.js') }}"></script>
            
            <script src="{{ asset('js/chat.js') }}"></script>
            <script src="{{ asset('js/friend.js') }}"></script>
            <script src="{{ asset('js/tpl_conf.js') }}"></script>

            <script src="{{ asset('js/echarts.min.js') }}"></script>
            <script src="{{ asset('js/macarons.js') }}"></script>
             @yield('footscript')
        </body>
    </html>