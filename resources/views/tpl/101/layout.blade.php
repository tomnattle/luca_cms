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
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        @include('UEditor::head')
        <style type="text/css">
        .navbar{background: #3798cf; border-radius: 0;}
        .navbar-default .navbar-brand{ color: #fff; }
        .navbar-default .navbar-brand:hover,.navbar-default .navbar-brand:visited,.navbar-default .navbar-brand:active{ color: #fff; }
        .navbar-default .navbar-nav>li>a, .navbar-default .navbar-text{ color: #fff; }
        .thumbnail a>img.head-ico, .thumbnail>img.head-ico{height: 70px;}
        .head-ico{
        height: 70px;
        width: 70px;
        border-radius: 35px;
        position: absolute;
        position:absolute;
        left: 0;
        right: 0;
        margin:auto;
        top:90px;
        }
        .left-sidebar{
        //width:270px;
        }
        .profile-bg {
        height: 120px;
        margin-bottom: 30px;
        }
        .profile p{
        font-weight: normal;
        font-size: 10px;
        }
        .left-sidebar{
        #background: #fff;
        }
        .about-me ul, .about-me li{
        margin: 0px;
        padding: 0px;
        list-style: none;
        list-style-type: none;
        }
        </style>
    </head>
    <body>
        <div id="app" style="padding-top: 90px;">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="/images/logo.png" style="height:40px; width: 40px; margin-top:-10px; margin-right:10px;display:inline">{{$site['name']}}</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            @include('tpl.101.menu')
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ env('APP_URL') }}">{{ config('app.name', 'Laravel') }}</a></li>
                            <!--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            -->
                        </ul>
                        
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9">
                        @yield('content')
                    </div>
                    <div class="col-sm-3">
                        @yield('right-side')
                        
                        <div class="col-sm-0">
                            <div class="col-sm- sidebar profile left-sidebar" style=" position: relative;">
                                <div class="thumbnail" >
                                    <img  src="{{$user['icon']}}" class="head-ico">
                                    <div  class="profile-bg" style="background: url(/images/rain.jpg) no-repeat #fff;background-size:100% ;"></div>
                                    <div class="caption">
                                        <h5 style="text-align: center;">{{$user['nick']}}</h5>
                                        <p>{{$site['desc']}}</p>
                                    </div>
                                </div>
                                @yield('left-side')
                            </div>
                            <div class="panel panel-info about-me">
                                <div class="panel-heading">关于我</div>
                                <div class="panel-body">
                                    <ul class="">
                                        <li>
                                            <span ></span>居住 <a href="#">{{ $user['born_address'] }}</a>
                                        </li>
                                        <li>
                                            <span ></span>来自 <a href="#">{{ $user['address'] }}</a>
                                        </li>
                                        <li>
                                            <span ></span>邮箱 <a href="#">{{ $user['mail'] }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script src="{{ asset('js/jquery.citys.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/jquery.cookie.js') }}"></script>
            <script src="{{ asset('js/mustache.min.js') }}"></script>
            <script src="{{ asset('js/toastr.min.js') }}"></script>
            <script src="{{ asset('js/tooltip.js') }}"></script>
            <script src="{{ asset('js/popover.js') }}"></script>
            <script src="{{ asset('js/data.js') }}"></script>
            <!-- Scripts -->
            <script src="{{ asset('js/mustache.min.js') }}"></script>
            <script src="{{ asset('js/cms.js') }}"></script>
            
            <script src="{{ asset('js/chat.js') }}"></script>
            <script src="{{ asset('js/friend.js') }}"></script>
            
            <script src="{{ asset('js/city.js') }}"></script>
            <script src="{{ asset('js/front.app.js') }}"></script>
            @include('front.script.baidu',['message'=>'site.index'])
        </body>
    </html>