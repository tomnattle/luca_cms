@extends('layouts.app')
@section('breadcrumb')

@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <a class="btn btn-info <?php if(count($sites)==3){echo "disabled";}?>"  href="{{url('/home/sites/create')}}" type="button">
            创建
            <span aria-hidden="true" class="glyphicon glyphicon-plus-sign">
            </span>
        </a>
    </div>
    <div class="panel-body">
        @if (Session::has('yes'))
        <div class="alert alert-success">
            提示：{{Session::get('yes')}}
        </div>
        @endif
            @if (Session::has('no'))
        <div class="alert alert-danger">
            警告：{{Session::get('no')}}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered folder-list">
                    <tr>
                        <th width="30">
                        </th>
                        <th>
                            文件名
                        </th>
                        <th width="140">
                            创建时间
                        </th>
                        <th>
                            大小
                        </th>
                    </tr>
                    @foreach($sites as $site)
                    <tr>
                        <td>
                            <label>
                                <input name="ids[]" type="checkbox" value="{{ $site['id'] }}">
                                </input>
                            </label>
                        </td>
                        <td>
                            <a href="/home/sites/{{$site['id']}}/select">
                                {{ $site['name'] }}
                            </a>
                        </td>
                        <td>
                            {{ $site['updated_at'] }}
                        </td>
                        <td>
                            <a class="btn btn-info btn-xs pull-right" href="/home/sites/{{$site['id']}}/select" role="button" style="margin-top: 0px; margin-left: 5px;">
                                管理
                            </a>
                            <a class="btn btn-success btn-xs pull-right" href="http://{{$site['en_name']}}.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}" role="button" style="margin-top: 0px;" target="_blank">
                                打开
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        说明：
        <br>
            1. 单个用户最大可创建3个站点
        </br>
    </div>
</div>
@endsection
