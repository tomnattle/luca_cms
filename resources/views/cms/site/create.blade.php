@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{url('home/sites')}}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
    </div>
    <div class="panel-body">
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
        <form class="form-horizontal" action="{{url('/home/sites')}}" method="POST" >
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-sm-1 control-label" >网站主题 <font color='red'>*</font></span></label>
                <div class="col-sm-3">
                    <input type="text" name="name" class="form-control"  placeholder="" value=""  >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >英文名 <font color='red'>*</font></label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="en_name" >
                        <span class="input-group-addon" >{{ env('SESSION_DOMAIN') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >密码 <font color='red'>*</font></label>
                <div class="col-sm-3">
                    <input type="password" name="password" class="form-control" style="width:100px;"  placeholder="" value="" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" >描述信息 <font color='red'>*</font></label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="desc" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="tpl_id" value=1>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit"  class="btn btn-success">保存</button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
        说明：
        <br>1. 网站主题,会出现在浏览器的标题栏
        <br>2. 英文名,为您网站的域名前缀，如填写tommy,您的站点域名将是tommy.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}
        <br>3. 密码,当编辑站点的某些操作时需要输入密码,长度为6
        <br>4. 描述信息,会出现在您站点的desc中
    </div>
</div>
@endsection