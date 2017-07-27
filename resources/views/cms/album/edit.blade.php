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
                      <a href="javascript:history.back()" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
                  </div>
                  <div class="panel-body">
                    <form action="{{url('/home/albums/' . $album['aid'])}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_method" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">分组</label>
                                <select name="g_id" class="form-control" id="select_group">
                                  <option value="0">默认</option>
                                  @foreach($groups as $group)
                                  <option
                                   @if($group['gid'] == $album['g_id'])
                                    selected="selected" 
                                    @endif
                                   value="{{$group['gid']}}">{{$group['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                          </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="exampleInputEmail1">相册名称</label>
                                    <input type="text" value="{{$album['name']}}" name="name" class="form-control"  placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">排序</label>
                          <div class="row">
                            <div class="col-xs-2">
                              <input type="index" value="{{$album['index']}}" class="form-control" name="index" value="0">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-md-3">
                                 <label for="exampleInputFile">封面</label>
                                  <input type="file" name="cover">
                              </div>
                              <div class="col-md-5">
                                @if($album['cover'])
                                  <img src="{{url('storage/' . $album['cover'])}}" height="82" width="82" />
                                @endif
                              </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">提交</button>
                        </div>
                    </form>
                  </div>
                </div>
 
@endsection