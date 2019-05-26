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
                            @include('layouts.user_bar')
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container main-container">
                <?php $active['admin'] = 'active'; ?>
                @include('layouts.menu')
                <div class="panel panel-default right-context clearfix" >
                    <ol class="breadcrumb site-breadcrumb">
                        <li ><a href="/home/admin">管理</a></li>
                    </ol>
                    <div class="panel-body ">
                        <div class="list-group sidebar2">
                            <div style="overflow-y:scroll; height: 480px;">
                            <a href="{{url('home/admin/report')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">首页</a>
                            <a href="{{url('home/admin/sites')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">子站</a>
                            <a href="{{url('home/admin/sites')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">用户</a>
                            <a href="{{url('home/admin/sites')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">评论</a>
                            <a href="{{url('home/admin/sites')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">站点</a>
                            <a href="{{url('home/admin/sites')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">广告</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">内容</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">消息</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">工具</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">友链</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">下载</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">安全</a><!--ip 黑名单-->
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">任务</a>
                            <a href="{{url('home/sites/pages')}}" class="list-group-item {{isset($active['site-admin']) ? $active['site-admin'] : ''}}">邮件</a>
                            </div>
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
            <script src="http://echarts.baidu.com/asset/map/js/china.js"></script>
            @yield('footscript')
            <script type="text/javascript">
                $('[data-toggle="tooltip"]').tooltip()
            </script>
        </body>
    </html>