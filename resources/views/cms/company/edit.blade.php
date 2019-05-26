@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li class="@if($form == 'config')active @endif "><a href="{{url('/home/companies', ['form'=>'config'])}}">配置<span class="sr-only">(current)</span></a></li>
    <li  class="@if($form == 'desc')active @endif "><a href="{{url('/home/companies', ['form'=>'desc'])}}">介绍<span class="sr-only">(current)</span></a></li>
    <li  class="@if($form == 'qualification')active @endif "><a href="{{url('/home/companies', ['form'=>'qualification'])}}">资质<span class="sr-only">(current)</span></a></li>
    <li  class="@if($form == 'contact')active @endif "><a href="{{url('/home/companies', ['form'=>'contact'])}}">联系<span class="sr-only">(current)</span></a></li>
    <li  class="@if($form == 'password')active @endif "><a href="{{url('/home/companies', ['form'=>'password'])}}">密码<span class="sr-only">(current)</span></a></li>
    <!--<li class=""><a href="{{url('/home/goods/attrs')}}">参数<span class="sr-only">(current)</span></a></li>-->
</ul>
    
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="{{url('/home/companies/' . $company['id'])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="form" value="{{ $form }}">
            @if($form == 'config')
            <div class="form-group">
                <label class="col-sm-1 control-label" >角色</label>
                <div class="col-xs-4">
                    <label class="radio-inline">
                        <input type="radio" @if($company['role']===0) checked="true" @endif name="role" id="inlineRadio1" value="0"> 个人
                    </label>
                    <label class="radio-inline">
                        <input type="radio" @if($company['role']===1) checked="true" @endif name="role" name="role" id="inlineRadio1" value="1"> 团体
                    </label>
                    <label class="radio-inline">
                        <input type="radio" @if($company['role']===2) checked="true" @endif name="role" name="role" id="inlineRadio2" value="2"> 企业
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >状态</label>
                <div class="col-xs-4">
                    <label class="radio-inline">
                        <input type="radio" @if($company['status']===1) checked="true" @endif name="status" id="inlineRadio1" value="1"> 在线
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" @if($company['status']===0) checked="true" @endif id="inlineRadio1" value="0"> 下线
                    </label>
                </div>
            </div>
            @endif
            @if($form == 'desc')
            <div class="form-group">
                <label class="col-sm-1 control-label" >简单描述</label>
        <div class="col-xs-11">
            <textarea class="form-control" name="short_desc">{{ $company['short_desc'] }}</textarea>
        </div>
                
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >详细描述</label>
                <div class="col-xs-11">
                <!-- 加载编辑器的容器 -->
                <script id="container" name="desc" type="text/plain">{!! htmlspecialchars_decode($company['desc']) !!}</script>
                <!-- 实例化编辑器 -->
            </div>
                <script type="text/javascript">
                var ue = UE.getEditor('container');
                </script>
            </div>
            @endif
            @if($form == 'qualification')
            <div class="form-group">
                <label class="col-sm-1 control-label" >企业资质</label>
                <!-- 加载编辑器的容器 -->
                <div class="col-xs-11"><script id="container1" name="qualification" type="text/plain">{!! htmlspecialchars_decode($company['qualification']) !!}</script></div>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                var ue = UE.getEditor('container1');
                </script>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if($form == 'contact')
            <div class="form-group">
                <label class="col-sm-1 control-label" >名称</span></label>
                <div class="col-xs-11"><input type="text" class="form-control" style="width: 50%"  id="" name="name" value="{{ $company['name'] }}" placeholder=""></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >电话</label>
                <div class="col-xs-11"><input type="text" class="form-control" id="" style="width: 30%" value="{{ $company['telephone'] }}" name="telephone" placeholder=""></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >传真</label>
                <div class="col-xs-11"><input type="text" class="form-control" id="" style="width: 30%" value="{{ $company['fax'] }}"  name="fax" placeholder=""></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >地址</label>
                <div class="col-xs-11"><input type="text" class="form-control" id="" style="width: 50%" value="{{ $company['addr'] }}"  name="addr" placeholder=""></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >邮箱</label>
                <div class="col-xs-11"><input type="text" class="form-control" id="" style="width: 40%"  value="{{ $company['email'] }}"  name="email" placeholder=""></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >QQ</label>
                <div class="col-xs-11"><input type="text" class="form-control" id="" style="width: 30%" name="qq" value="{{ $company['qq'] }}"  placeholder=""></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >微信</label>
                <div class="col-xs-11"><input type="text" class="form-control" id="" style="width: 30%" name="wechat" value="{{ $company['wechat'] }}"  placeholder=""></div>
            </div>
            @endif
            @if($form == 'password')
            <div class="form-group">
                <label class="col-sm-1 control-label" >原始密码</label>
                <div class="col-xs-11"><input type="password" class="form-control"  style="width: 30%"  id="password_old" name="password_old" value=""  placeholder="原始密码"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >新密码</label>
                <div class="col-xs-11"><input type="password" class="form-control"  style="width: 30%"  id="password" name="password" placeholder="新密码"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >确认输入</label>
                <div class="col-xs-11"><input type="password" class="form-control"  style="width: 30%"  id="password_confirmation" name="password_confirmation" placeholder="新密码"></div>
            </div>
            
            @endif
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                  <button type="submit" class="btn btn-info ">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection