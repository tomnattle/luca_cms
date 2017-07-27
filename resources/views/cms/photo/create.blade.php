@extends('layouts.cms')
@section('content')
                 <nav class="navbar navbar-default">
                  <div class="container">
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/home/albums')}}">相册<span class="sr-only">(current)</span></a></li>
                    
                  </ul>
                  </div>
                </nav>

                <div class="panel panel-default">
                  <div class="panel-heading">
                      <a href="{{url('home/albums')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
                  </div>
                  <div class="panel-body">
                    <form action="{{url('/home/photos')}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_method" value="POST">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">分组</label>
                                <select name="g_id" class="form-control" id="select_group_album">
                                  <option value="0">默认</option>
                                  @foreach($groups as $group)
                                  <option value="{{$group['gid']}}">{{$group['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">相册</label>
                                <select name="a_id" class="form-control" id="select_cat_album">
                                  <option value="0">请选择相册</option>
                                  @foreach($albums as $album)
                                  <option value="{{$album['aid']}}">{{$album['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">标题</label>
                            <input type="text" name="name" class="form-control"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">图片</label>
                            <input type="file"  name="file">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">描述</label>
                             <textarea name="desc" class="form-control" ></textarea> 
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">提交</button>
                        </div>
                    </form>
                  </div>
                </div>
 
@endsection