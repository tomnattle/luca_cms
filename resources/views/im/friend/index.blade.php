@extends('layouts.im')
@section('content')
@include('im.menu')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group friend-list">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    群
                                </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item friend-user">laravel交流群<img class="media-object header pull-left" src="/images/q.png"></li>
                                        <li class="list-group-item friend-user">e成研发群<img class="media-object header pull-left" src="/images/q.png"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    我的同事
                                </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item friend-user">明东<img class="media-object header pull-left" src="/images/tz.png"></li>
                                        <li class="list-group-item friend-user">秦始皇<img class="media-object header pull-left" src="/images/qsh.png"></li>
                                        <li class="list-group-item friend-user">悟空<img class="media-object header pull-left" src="/images/wk.png"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    我的同学
                                </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item friend-user">macheal</li>
                                        <li class="list-group-item friend-user">jimi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        加好友
                    </div>
                    <div class="panel-body">
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="账号/群号">
                            </div>
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        群创建
                    </div>
                    <div class="panel-body">
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="群名称">
                            </div>
                            <button type="submit" class="btn btn-default">创建</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection