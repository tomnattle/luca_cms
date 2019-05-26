@extends('layouts.cms')
@section('content')
<input id="tpl_conf_flg" type="hidden"></input>
<ul class="context-nav">
    <li class=""><a href="{{url('/home/templates')}}">列表<span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="{{url('/home/sites/config')}}">设置<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">菜单</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-2">
                <ul class="menu clearfix well" id="menus">
                    <li><a href='javascript:void(0);'  class="btn btn-xs disabled">首页</a></li>
                    <li><a href='javascript:void(0);' class="btn btn-xs disabled">关于我们</a></li>
                    <?php $index = 0;?>
                    @foreach($conf['menus'] as $key => $menu)
                    <li><a href='javascript:void(0);' data-index='{{ $index }}' data-show='{{ isset($menu['is_show'])? $menu['is_show'] :1 }}' data-g_id='{{ $menu['g_id'] }}' class='btn btn-xs editable'>{{ $menu['name'] }}</a></li>
                    <?php $index++;?>
                    @endforeach
                    <li><a href='javascript:void(0);' class="btn btn-xs disabled">人员招聘</a></li>
                    <li><a href='javascript:void(0);' class="btn btn-xs disabled">博客</a></li>
                    <li><a href='javascript:void(0);' class="btn btn-xs disabled">在线留言</a></li>
                    <li><a href='javascript:void(0);' class="btn btn-xs disabled">联系我们</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="well menu_form hide" >
                    <div class="form-group">
                        <label  class="control-label">名称</label>
                        <input name="name" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">绑定数据</label>
                        <select name="g_id" class="form-control">
                            <option value="0">请选择</option>
                            @foreach($groups as $group)
                            <option value="{{ $group['id'] }}">{{ $group['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label  class="control-label">在＊后</label>
                        <select name="position" class="form-control">
                            <option value="-1">首页</option>
                            <?php $index = 0;?>
                            @foreach($conf['menus'] as $key => $menu)
                            <option value="{{ $index }}">{{ $menu['name'] }}</option>
                            <?php $index++;?>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label  class="control-label"></label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="is_show"  value="0" >
                                隐藏
                            </label>
                            <label>
                                <input type="radio" name="is_show" checked="true"  value="1">
                                展示
                            </label>
                        </div>
                    </div>
                    <div class="clearfix">
                        <input type="button" class="btn btn-success pull-right btn_save_menu btn-xs" name="" value="保存">
                        <input type="button" class="btn btn-info pull-right btn_new_menu btn-xs" style="margin-right: 10px;" name="" value="新增">  <input type="button" class="btn btn-danger pull-right btn_del_menu btn-xs" style="margin-right: 10px;" name="" value="删除"> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        说明：
        <br>1. 蓝色菜单为可编辑部分，灰色菜单为不可编辑部分
        <br>2. 点击左侧菜单名称，进入编辑面板
        <br>3. 可编辑菜单项数目必须大于1
        <br>4. 未绑定栏目的菜单为无效菜单，不展示在前端页面
        <br>5. 点击左侧任何蓝色菜单项，修改右侧编辑面板内容，点击新增，会增加一个菜单项
    </div>
</div>
@endsection