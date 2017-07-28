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
                      <a href="{{url('home/articles')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
                  </div>
                  <div class="panel-body">
                    <form action="{{url('/home/articles')}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_method" value="POST">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">分组</label>
                                <select name="g_id" class="form-control" id="select_group">
                                  <option value="0">默认</option>
                                  @foreach($groups as $group)
                                  <option value="{{$group['gid']}}">{{$group['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">分类</label>
                                <select name="c_id" class="form-control" id="select_cat">
                                  <option value="0">默认</option>
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">标题</label>
                            <input type="text" name="title" class="form-control"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">封面</label>
                            <input type="file" name="cover">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">内容</label>
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="context" type="text/plain"></script>

                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                            </script>
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">提交</button>
                        </div>
                    </form>
                  </div>
                </div>
 
@endsection