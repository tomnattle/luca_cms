@extends('layouts.cms')
@section('content')
                 <nav class="navbar navbar-default">
                  <div class="container">
                    <ul class="nav navbar-nav">
                    <li ><a href="{{url('/home/articles')}}">文章</a></li>
                    <li class="active"><a href="{{url('/home/article-cats')}}">分类<span class="sr-only">(current)</span></a></li>
                    <!--<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                      </ul>
                    </li>-->
                  </ul>
                  </div>
                </nav>

                <div class="panel panel-default">
                  <div class="panel-heading">
                      <a href="{{url('home/article-cats/create')}}" type="button" class="btn btn-primary">
                      新增 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                  </div>
                  <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3">
                            <select name="g_id" class="form-control" id ="select_group_reload" >
                            <option value="0">请选择分组</option>
                              @foreach($groups as $group)
                              <option value="{{$group['gid']}}" 
                                @if($group['gid'] == $g_id)
                                selected="selected" 
                                @endif
                              >{{$group['name']}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-striped _list">
                            <tr>
                              <th class="">名称</th>
                              <th class="" width="90">排序</th>
                              <th class="" width="90">时间</th>
                              <th class="" width="90">操作</th>
                            </tr>
                             @foreach ($articleCats as $articleCat)
                             <tr>
                                <td class="">{{$articleCat['name']}}</td>
                                <th class="" width="90">{{$articleCat['index']}}</th>
                                <td class="" width="90">{{date('Y-m-d',strtotime($articleCat['created_at']))}}</td>
                                <td class="" width="50">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          编辑 <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="btn btn-link" href="{{url('/home/article-cats/' . $articleCat['cid'] . '/edit')}}">编辑</a></li>
                                          <li><a class="btn btn-link bt_del_article_cat" data-id="{{$articleCat['cid']}}" href="javascript:void(0)">删除</a></li>
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