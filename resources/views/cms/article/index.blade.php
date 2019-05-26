@extends('layouts.cms')
@section('content')
<ul class="context-nav">
  <li class="active"><a href="{{url('/home/articles')}}">文章<span class="sr-only">(current)</span></a></li>
  <li><a href="{{url('/home/article-cats')}}">分类</a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <form action="{{url('/home/articles')}}" method="GET">
      <div class="row">
        <div class="col-xs-5">
          <a href="{{url('home/articles/create')}}" type="button" class="btn btn-info">
            新增 <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
          </div>
          <div class="col-xs-2">
            <select name="g_id" class="form-control" id="select_group">
              <option value="0">分组</option>
              @foreach($groups as $group)
              <option value="{{$group['id']}}"
                @if($g_id == $group['id'])
                selected="selected"
                @endif
              >{{$group['name']}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-2">
            <select name="c_id" class="form-control" id="select_cat">
              <option value="0">分类</option>
              @foreach($articleCats as $articleCat)
              <option value="{{$articleCat['id']}}"
                @if($c_id == $articleCat['id'])
                selected="selected"
                @endif
              >{{$articleCat['name']}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-3">
            <div class="input-group pull-right">
                <input type="text" class="form-control" placeholder="关键词.." name="keywords" value="">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-info ">搜索</button>
                </span>
              </div>
          </div>
        </div>
      </form>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-bordered _list">
        @foreach ($articles as $article)
        <tr>
          <td class="">{{$article['title']}}</td>
          <td class="" width="120">{{date('Y-m-d',strtotime($article['created_at']))}}</td>
          <td class="" width="100">
            <a class="btn btn-xs btn-danger bt_del_article" data-id="{{$article['id']}}" href="javascript:void(0)">删除</a>
            <a class="btn btn-xs btn-info" href="{{url('/home/articles/' . $article['id'] . '/edit')}}">编辑</a>
            
          </td>
        </tr>
        @endforeach
      </table>
      {!! $articles->links() !!}
    </div>
  </div>
  @endsection