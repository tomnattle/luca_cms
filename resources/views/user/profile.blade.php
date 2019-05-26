@extends('layouts.setting')
@section('content')
<?php $active['user_info'] = 'active';?>
@include('user.menu')
<div class="panel panel-default profile">
    <div class="panel-body">
        <div class="row baseinfo clearfix">
            <div class="col-md-12">
                <div class="pull-left text-center" >
                    <img src="{{ $user['icon'] }}"  >
                    <p><a href="">修改</a></p>
                </div>
                <div class="pull-left">
                    登录账号 ： {{ $user['email'] }} <br>
                    账号名称 ： {{ $user['name'] }} <br>
                    账号编号 ： u_{{ str_pad( $user['id'], 8, '0',STR_PAD_LEFT) }}<br>
                    注册时间 ： {{ $user['created_at'] }}
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">请完善以下信息,方便我们更好的为您服务</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    警告：
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-horizontal" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h5>基本信息</h5>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">姓名</label>
                        <div class="col-sm-3">
                            <input type="text" name="name" value="{{ $user['name'] }}" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">英文名</label>
                        <div class="col-sm-3">
                            <input type="text" name="en_name" value="{{ $user['en_name'] }}" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">昵称</label>
                        <div class="col-sm-3">
                            <input type="text" name="nick" value="{{ $user['nick'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">年龄</label>
                        <div class="col-sm-1">
                            <input type="text" name="age" value="{{ $user['age'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">性别</label>
                        <div class="col-sm-3">
                            <?php $sex=[$user['sex'] => 'checked' ];?>
                            <label>
                                <input type="radio" name="sex" value="0" {{ @$sex[0] }}>
                                女
                            </label>
                            <label>
                                <input type="radio" name="sex"  value="1" {{ @$sex[1] }}>
                                男
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">结婚</label>
                        <div class="col-sm-3">
                            <?php $marry=[$user['marry'] => 'checked' ];?>
                            <label>
                                <input type="radio" name="marry" value="0" {{ @$marry[0] }}>
                                未
                            </label>
                            <label>
                                <input type="radio" name="marry" value="1" {{ @$marry[1] }}>
                                已
                            </label>
                        </div>
                    </div>
                    <h5>联系方式</h5>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">邮箱</label>
                        <div class="col-sm-3">
                            <input type="text" name="mail" value="{{ $user['mail'] }}" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">电话</label>
                        <div class="col-sm-3">
                            <input type="text" name="phone" value="{{ $user['phone'] }}" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">QQ</label>
                        <div class="col-sm-3">
                            <input type="text" name="qq" value="{{ $user['qq'] }}" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">微信</label>
                        <div class="col-sm-3">
                            <input type="text" name="weixin" value="{{ $user['weixin'] }}" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">地址</label>
                        <div class="col-sm-4">
                            <input type="text" name="address" value="{{ $user['address'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">家乡</label>
                        <div class="col-sm-3">
                            <input type="text" name="born_address" value="{{ $user['born_address'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <h5>教育信息</h5>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">专业</label>
                        <div class="col-sm-3">
                            <input type="text" name="major"  value="{{ $user['major'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">语言</label>
                        <div class="col-sm-4">
                            <input type="text" name="language" value="{{ $user['language'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">学校</label>
                        <div class="col-sm-3">
                            <input type="text" name="school"  value="{{ $user['school'] }}" class="form-control" id="input3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-1 control-label">学历</label>
                        <div class="col-sm-5">
                            <label class="radio-inline">
                                <input @if($user['degree'] == 0) checked @endif type="radio" name="degree" id="dgr1" value="0"> 初中
                            </label>
                            <label class="radio-inline">
                                <input @if($user['degree'] == 1) checked @endif type="radio" name="degree" id="dgr2" value="1"> 高中＋
                            </label>
                            <label class="radio-inline">
                                <input @if($user['degree'] == 2) checked @endif type="radio" name="degree" id="dgr3" value="2"> 大专＋
                            </label>
                            <label class="radio-inline">
                                <input @if($user['degree'] == 3) checked @endif type="radio" name="degree" id="dgr3" value="3"> 本科＋
                            </label>
                            <label class="radio-inline">
                                <input @if($user['degree'] == 4) checked @endif type="radio" name="degree" id="dgr4" value="4"> 硕士＋
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <button type="submit" class="btn btn-info">更新</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection