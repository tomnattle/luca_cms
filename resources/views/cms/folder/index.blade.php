@extends('layouts.app')
@section('breadcrumb')
<li class="active" ><a href="/home/folders" >文件</a></li>
@endsection
@section('content')
<input type="hidden" id="folder_flg" name="">
<div class="panel panel-default file-manager">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" type="button"  class="btn btn-success btn_folder_create">
                    新建文件夹 <span class="icon-folder-close" aria-hidden="true"></span>
                </a>
                <a href="javascript:void(0)" type="button"  class="btn btn-danger btn_folder_del pull-right">
                    删除 <span class="glyphicon glyphicon-remove " aria-hidden="true"></span>
                </a>
                <a type="button" data-toggle="modal" style="margin-right: 10px;" data-target="#myModal" class="btn btn-info btn_folder_rename hidden pull-right">
                    重命名 <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                </a>
            </div>
            
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered folder-list">
                    <tr>
                        <th width="30"></th>
                        <th width="30"></th>
                        <th>文件名</th>
                        <th>大小</th>
                        <th width="140">修改时间</th>
                    </tr>
                    
                    @foreach($folders as $folder)
                    <tr>
                        <td>
                            <label>
                                <input name="ids[]" value="{{ $folder['id'] }}" type="checkbox">
                            </label>
                        </td>
                        <td><span class="icon-folder-close"></span></td>
                        <td><a href="/home/files?f_id={{ $folder['id'] }}">{{ $folder['name'] }}</a></td>
                        <td>-</td>
                        <td>{{ $folder['updated_at'] }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            <label>
                                <input name="ids[]" value="0" type="checkbox">
                            </label>
                        </td>
                        <td><span class="icon-folder-close"></span></td>
                        <td><a href="/home/files?f_id=0">其他文件</a></td>
                        <td>-</td>
                        <td>2018-01-01 00:00:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        备注:
        <br>1 . 每个用户可以创建30个分组
        <br>1 . 删除多个文件夹时，如果某个文件夹存在文件，则不会有任何文件被删除
    </div> 
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">文件夹名称</h5>
      </div>
      <div class="modal-body">
        <p><input type="text" class="form-control" name="folder_name"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn_save_name">保存</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection