@extends('layouts.setting')
@section('content')
<?php $active['user_secure'] = 'active';?>
@include('user.menu')
<div class="panel panel-default">
    <div class="panel-body">
        @if (Session::has('success'))
        <div class="alert alert-success">
            提示：
            <ul>
                <li>密码修改成功！</li>
            </ul>
        </div>
        @endif
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
            <div class="form-group">
                <label for="" class="col-md-1 control-label">原始密码</label>
                <div class="col-md-3">
                    <input type="password" name="old_password" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-1 control-label">新密码</label>
                <div class="col-md-3">
                    <input type="password" name="password" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-1 control-label">确认密码</label>
                <div class="col-md-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-md-3">
                    <button type="submit" class="btn btn-info">更新</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection