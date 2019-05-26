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
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
          
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
                            <li><a href="{{ route('login') }}">登录</a></li>
                            <li><a href="{{ route('register') }}">注册</a></li>
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
                @if (!Auth::guest())
                @include('layouts.menu')
                <div class="panel panel-default right-context">
                    <ol class="breadcrumb site-breadcrumb">
                        <li ><a href="/home">主页</a></li>
                        @yield('breadcrumb')
                    </ol>
                    <div class="panel-body">
                        <div class="list-group sidebar2">
                            <a class="list-group-item {{isset($active['admin.index']) ? $active['admin.index'] : ''}}"  href="{{url('/home')}}">欢迎页<span class="sr-only">(current)</span></a></li>
                            <a class="list-group-item {{isset($active['admin.document']) ? $active['admin.document'] : ''}}"  href="{{url('/home/document')}}">帮助文档<span class="sr-only">(current)</span></a></li>
                        </div>
                        <div class="right-context2">
                    @else
                    <div class="panel panel-default ">
                        <div class="row right-context2-without-siderbar">
                            <div class="col-md-12">
                        @endif
                        
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
                <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                <script src="{{ asset('js/toastr.min.js') }}"></script>
                <script src="{{ asset('js/jquery.cookie.js') }}"></script>
                <script src="{{ asset('js/jquery.citys.js') }}"></script>
                <script src="{{ asset('js/mustache.min.js') }}"></script>
                <script src="{{ asset('js/tooltip.js') }}"></script>
                <script src="{{ asset('js/popover.js') }}"></script>
                <script src="{{ asset('js/data.js') }}"></script>
                <!-- Scripts -->
                <script src="{{ asset('js/cms.js') }}"></script>
                <script src="{{ asset('js/city.js') }}"></script>
                
                <script src="{{ asset('js/chat.js') }}"></script>
                <script src="{{ asset('js/friend.js') }}"></script>

                <script src="{{ asset('js/echarts.min.js') }}"></script>
                <script src="{{ asset('js/macarons.js') }}"></script>
                @yield('footscript')
                <script type="text/javascript">
                    $('[data-toggle="tooltip"]').tooltip()
                </script>
            </body>
        </html>