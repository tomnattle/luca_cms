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
            <nav class="navbar navbar-default navbar-fixed-top">
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
                <?php $active['friend'] = 'active'; ?>
                @include('layouts.menu')
                
                <div class="panel panel-default right-context clearfix" >
                    <ol class="breadcrumb site-breadcrumb">
                        <li ><a href="/home/sites">站点</a></li>
                        
                    </ol>
                    <div class="panel-body ">
                        <div class="list-group sidebar2">
                            <a class="list-group-item {{isset($active['im.chat']) ? $active['im.chat'] : ''}}"  href="{{url('/home/im/chats')}}">聊天<span class="sr-only">(current)</span></a></li>
                            <a class="list-group-item {{isset($active['im.friend']) ? $active['im.friend'] : ''}}"  href="{{url('/home/im/friends')}}">好友<span class="sr-only">(current)</span></a>
                            <a class="list-group-item {{isset($active['im.friend']) ? $active['im.friend'] : ''}}"  href="{{url('/home/im/friends')}}">关注<span class="sr-only">(current)</span></a>
                            <a class="list-group-item {{isset($active['im.lbs']) ? $active['im.lbs'] : ''}}"  href="{{url('/home/im/lbses')}}">附近<span class="sr-only">(current)</span></a>
                            <a class="list-group-item {{isset($active['im.message']) ? $active['im.message'] : ''}}"  href="{{url('/home/im/messages')}}">消息<span class="sr-only">(current)</span></a>
                        </div>
                        <div class="right-context2">
                            
                            @yield('content')
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
            </body>
        </html>