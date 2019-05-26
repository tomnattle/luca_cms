@extends('layouts.cms')
@section('content')
<ul class="context-nav">
    <li><a href="{{url('/home/articles')}}">文章</a></li>
    <li class="active"><a href="{{url('/home/article-cats')}}">分类<span class="sr-only">(current)</span></a>
</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
    <a href="{{url('home/article-cats/create')}}" type="button" class="btn btn-info">
        新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-2">
                <select name="g_id" class="form-control" id="select_group_reload">
                    <option value="0">全部</option>
                    @foreach($groups as $group)
                    <option value="{{$group['id']}}"
                        @if($group['id'] == $g_id)
                        selected="selected"
                        @endif
                    >{{$group['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-10">
                <table class="table table-striped _list table-bordered">
                    <tr>
                        <th class="">名称</th>
                        <th class="" width="90">排序</th>
                        <th class="" width="90">时间</th>
                        <th class="" width="100"></th>
                    </tr>
                    @foreach ($articleCats as $articleCat)
                    <tr>
                        <td class="">{{$articleCat['name']}}</td>
                        <th class="" width="90">{{$articleCat['index']}}</th>
                        <td class="" width="90">{{date('Y-m-d',strtotime($articleCat['created_at']))}}</td>
                        <td class="" width="50">
                            <a class="btn btn-danger bt_del_article_cat btn-xs"
                            data-id="{{$articleCat['id']}}" href="javascript:void(0)">删除</a>
                            <a class="btn btn-info btn-xs"
                            href="{{url('/home/article-cats/' . $articleCat['id'] . '/edit')}}">编辑</a>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</div>
</div>
@endsection