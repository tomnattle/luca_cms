@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/article-groups')}}">列表<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="{{url('home/article-groups/create')}}" type="button" class="btn btn-info ">
      新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-bordered _list">
        <tr>
          <th class="">名称</th>
          <th class="" width="50">类型</th>
          <th class="" width="90">时间</th>
          <th class="" width="100"></th>
        </tr>
        @foreach ($groups as $group)
        <tr>
          <td class="">{{$group['name']}}</td>
          <td class="">{{$groupNames[$group['model_type']]}}</td>
          <td class="" width="90">{{date('Y-m-d',strtotime($group['created_at']))}}</td>
          <td class="" width="50">
            <a class="btn btn-danger btn-xs bt_del_article_group" data-id="{{$group['id']}}" href="javascript:void(0)">删除</a>
            <a class="btn btn-info btn-xs" href="{{url('/home/article-groups/' . $group['id'] . '/edit')}}">编辑</a>
          </td>
        </tr>
        @endforeach
      </table>
    </table>
  </div>
</div>
@endsection