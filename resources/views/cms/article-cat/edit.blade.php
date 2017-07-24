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
                      <a href="{{url('/home/article-cats?g_id=' . $articleCat['g_id'])}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
                  </div>
                  <div class="panel-body">
                    <form action="{{url('/home/article-cats/' . $articleCat['cid'])}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_method" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">名称</label>
                            <input type="text" name="name" class="form-control"  placeholder="" value="{{$articleCat['name']}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">排序</label>
                          <div class="row">
                            <div class="col-xs-2">
                              <input type="index" class="form-control" name="index" value="{{$articleCat['index']}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">封面</label>
                            <input type="file" name="cover">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">提交</button>
                        </div>
                    </form>
                  </div>
                </div>
@endsection