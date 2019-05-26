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
                <?php $active['setting'] = 'active'; ?>
                @include('layouts.menu')
                <div class="panel panel-default right-context">
                    <ol class="breadcrumb site-breadcrumb">
                        <li ><a href="/home/settings">设置</a></li>
                    </ol>
                    <div class="panel-body ">
                        <div class="list-group sidebar2">
                            <a href="{{url('home/settings')}}" class="list-group-item {{isset($active['user']) ? $active['user'] : ''}}">账户</a>
                            <!--
                            <a href="#{{url('home/message')}}" class="list-group-item {{isset($active['message']) ? $active['message'] : ''}}">站内消息</a>
                            -->
                        </div>
                        <div class="right-context2">
                            
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
            <script src="{{ asset('js/tpl_conf.js') }}"></script>
        </body>
    </html>