@extends('layouts.setting')
@section('content')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/home/sites')}}">字典<span class="sr-only">(current)</span></a></li>
        </ul>
    </div>
</nav>
<div class="panel panel-default">
    <div class="panel-heading">
        <a _href="{{url('/home/setting/dicts/create')}}" data-toggle="modal"  data-target="#setting-dict-create" class="btn btn-info">
            新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered _list">
                <tr>
                    <th class="" width=20></th>
                    <th class="" width="100">主键<br></th>
                    <th class="">名称</th>
                    <th class="" width="120">更新时间</th>
                </tr>
                @foreach($dicts as $dict)
                <tr>
                    <td class="">
                        <label>
                            <input name="ids[]" value="" type="checkbox">
                        </label>
                    </td>
                    <td class=""><a class="btn" data-id="{{ $dict['id'] }}" data-label='{{ $dict['name'] }}({{ $dict['key'] }})' data-toggle="modal"  data-target="#setting-dict" >{{ $dict['key'] }}</a></td>
                    <td class="">{{ $dict['name'] }}</td>
                    
                    <td class="" width="">{{ date('Y-m-d', strtotime($dict['updated_at'])) }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="setting-dict" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" style="height: 300px; width: 100%;"> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn-save btn btn-info">更新</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="setting-dict-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel1">新增</h4>
                </div>
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">名称</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">主键</label>
                                <input type="text" class="form-control" name="key">
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">值</label>
                        <textarea class="form-control" style="height: 200px; width: 100%;"> </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn-save btn btn-info">更新</button>
                </div>
            </div>
        </div>
    </div>
    @endsection