@extends('layouts.cms')
@section('content')
                 <nav class="navbar navbar-default">
                  <div class="container">
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/home/articles')}}">文章<span class="sr-only">(current)</span></a></li>
                    <li><a href="{{url('/home/article-cats')}}">分类</a></li>
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
                    <form action="{{url('/home/articles')}}" method="GET">
                    <div class="row">
                        <div class="col-xs-3">
                          <a href="{{url('home/articles/create')}}" type="button" class="btn btn-primary">
                          新增 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                        </div>

                        <div class="col-xs-2">
                            <select name="g_id" class="form-control" id="select_group">
                                  <option value="0">栏目</option>
                                  @foreach($groups as $group)
                                  <option value="{{$group['gid']}}"
                                  @if($g_id == $group['gid'])
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
                                  <option value="{{$articleCat['cid']}}"
                                  @if($c_id == $articleCat['cid'])
                                    selected="selected" 
                                  @endif
                                  >{{$articleCat['name']}}</option>
                                  @endforeach
                            </select>
                        </div>
                         <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="关键词.." name="keywords" value="">
                        </div>
                         <div class="col-xs-2">
                            <button type="submit" class="btn btn-primary">搜索</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="panel-body">
                        <table class="table table-striped _list">
                           @foreach ($articles as $article)
                           <tr>
                              <td class="">{{$article['title']}}</td>
                              <td class="" width="90">{{date('Y-m-d',strtotime($article['created_at']))}}</td>
                              <td class="" width="50">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        编辑 <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a class="btn btn-link" href="{{url('/home/articles/' . $article['id'] . '/edit')}}">编辑</a></li>
                                        <li>
                                            <form method="post" action="{{url('/home/articles/' . $article['id'])}}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input style="margin:0 auto; width: 100%; color: #333; text-decoration: none" class="btn btn-link" type="submit" value="删除">   
                                            </form>
                                        </li>  
                                      </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {!! $articles->links() !!}
                  </div>
                </div>
@endsection