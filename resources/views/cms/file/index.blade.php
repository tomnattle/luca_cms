@extends('layouts.app')
@section('content')
@section('breadcrumb')
<li ><a href="/home/folders">文件</a></li>
@if(@$fid > 0)
<li class="active"><a href="/home/files?f_id={{ $folder['id'] }}">{{ $folder['name'] }}</a></li>
@else
<li class="active"><a href="/home/folders">全部文件</a></li>
@endif
@endsection
<input type="hidden" id="file_flg" name="">
<link href="{{ asset('fine-uploader/fine-uploader-gallery.css') }}" rel="stylesheet">
<script src="{{ asset('fine-uploader/fine-uploader.js') }}"></script>
<script type="text/template" id="qq-template-gallery">
<div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
    <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
    </div>
    <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
        <span class="qq-upload-drop-area-text-selector"></span>
    </div>
    <div class="qq-upload-button-selector qq-upload-button">
        <div>Upload a file</div>
    </div>
    <span class="qq-drop-processing-selector qq-drop-processing">
        <span>Processing dropped files...</span>
        <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
    </span>
    <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
        <li>
            <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
            </div>
            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
            <div class="qq-thumbnail-wrapper">
                <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
            </div>
            <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
            <button type="button" class="qq-upload-retry-selector qq-upload-retry">
            <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
            Retry
            </button>
            <div class="qq-file-info">
                <div class="qq-file-name">
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                </div>
                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                <span class="qq-upload-size-selector qq-upload-size"></span>
                <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                </button>
                <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                </button>
                <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                </button>
            </div>
        </li>
    </ul>
    <dialog class="qq-alert-dialog-selector">
    <div class="qq-dialog-message-selector"></div>
    <div class="qq-dialog-buttons">
        <button type="button" class="qq-cancel-button-selector">Close</button>
    </div>
    </dialog>
    <dialog class="qq-confirm-dialog-selector">
    <div class="qq-dialog-message-selector"></div>
    <div class="qq-dialog-buttons">
        <button type="button" class="qq-cancel-button-selector">No</button>
        <button type="button" class="qq-ok-button-selector">Yes</button>
    </div>
    </dialog>
    <dialog class="qq-prompt-dialog-selector">
    <div class="qq-dialog-message-selector"></div>
    <input type="text">
    <div class="qq-dialog-buttons">
        <button type="button" class="qq-cancel-button-selector">Cancel</button>
        <button type="button" class="qq-ok-button-selector">Ok</button>
    </div>
    </dialog>
</div>
</script>
<div class="panel panel-default file-manager">
    <div class="panel-heading">
        <form>
            <div class="row">
                <div class="col-md-3">
                    <a href="/home/folders" type="button" id="" class="btn btn-info">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回
                    </a>
                    <a  type="button" id="btn_file_upload"  data-toggle="modal" data-target="#myModal_upload" class="btn btn-success">
                        上传 <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="col-md-2">
                    <select name='f_id' class="form-control">
                        <option value="0">全部文件</option>
                        @foreach($folders as $folder)
                        <option @if($folder['id'] == $fid) selected @endif value="{{ $folder['id'] }}">{{ $folder['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <!--
                <div class="col-md-2">
                    <select name='type_id' class="form-control">
                        <option value="0" @if($typeid == 0) selected @endif>全部类型</option>
                        <option value="1" @if($typeid == 1) selected @endif>图片</option>
                        <option value="10" @if($typeid == 10) selected @endif>其他</option>
                    </select>
                </div>
                -->
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" name="keywords" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <input type="hidden" name="">
                            <button class="btn btn-info" id="btn_file_search" type="sumbit">搜索</button>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group pull-left" role="group" aria-label="...">
                      <button type="button" class="btn btn-info btn-manage">管理</button>

                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          操作
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="btn-select-all"  href="javascript:void(0);">全选/取消</a></li>
                          <li><a class="btn-del-files" href="javascript:void(0);">删除</a></li>
                        </ul>
                      </div>
                    </div>

                    <span class="input-group-btn">
                        <button data-mode='th' type="button" class="view-mode btn btn-default btn-md pull-right @if($mode == 'th') active @endif">
                        <span class="glyphicon glyphicon-th " aria-hidden="true"></span> 网格
                        </button>
                        <button  data-mode='li' type="button" class="view-mode btn btn-default btn-md  pull-right  @if($mode == 'li') active @endif">
                        <span class="glyphicon glyphicon-th-list " aria-hidden="true"></span> 列表
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 file-list">
                @if($mode == 'li')
                <table class="table table-striped ">
                    <tr>
                        <th width="30"></th>
                        <th>文件名</th>
                        <th>大小</th>
                        <th width="140">修改时间</th>
                    </tr>
                    @foreach($files as $file)
                    <tr>
                        <td>
                            <label>
                                <input name="ids[]" data-id='{{ $file['id'] }}' class='ckb' value="" type="checkbox">
                            </label>
                        </td>
                        <td><span class="glyphicon glyphicon-picture"></span> <a style="cursor: pointer;" ="" data-toggle="modal" data-target="#myModal_preview" data-src="{{ url('storage/' . $file['name']) }}" >{{ $file['name'] }}</a></td>
                        <td>{{ round($file['size']/1024/1024, 2) }}M</td>
                        <td>{{ $file['created_at'] }}</td>
                    </tr>
                    @endforeach
                </table>
                @else
                <div class="row">
                    @foreach($files as $file)
                    <div class="col-md-2">
                        <div class="thumbnail">
                            <div class="img-box">
                                <img  data-toggle="modal" data-target="#myModal_preview" data-src="{{ url('storage/' . $file['name']) }}"  onload='resize(this)' src="{{ url('storage/' . $file['thumbnail']) }}"/>
                            </div>
                            <div class="btn-manages clearfix" style="display: none;">
                                <div class="checkbox-xs pull-right">
                                    <label>
                                      <input data-id='{{ $file['id'] }}' class='ckb' type="checkbox">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                {!! $files->links() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_upload" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">上传面板</h5>
            </div>
            <div class="modal-body">
                <div id="fine-uploader-gallery"></div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary ">完成</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_preview" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg-x" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="image-previw">
                    <span  class="thumbnail">
                        <img src="">
                    </span>
                </div>
                <div class="image-prop"></div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger ">关闭</button>
            </div>
        </div>
    </div>
</div>
<script>
var galleryUploader = new qq.FineUploader({
    element: document.getElementById("fine-uploader-gallery"),
    template: 'qq-template-gallery',
    request: {
    endpoint: '/server/uploads?_token={{ csrf_token() }}&f_id={{ @$fid }}'
},
thumbnails: {
placeholders: {
    waitingPath: '/fine-uploader/placeholders/waiting-generic.png',
    notAvailablePath: '/fine-uploader/placeholders/not_available-generic.png'
}
},
validation: {
    allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
}
});
</script>
@endsection