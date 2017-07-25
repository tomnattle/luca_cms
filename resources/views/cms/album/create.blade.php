@extends('layouts.cms')
@section('content')
               
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <a href="javascript:history.back()" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
                  </div>
                  <div class="panel-body">
                    <form action="{{url('/home/albums')}}" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_method" value="POST">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">栏目</label>
                                <select name="g_id" class="form-control" id="select_group">
                                  <option value="0">默认</option>
                                  @foreach($groups as $group)
                                  <option value="{{$group['gid']}}">{{$group['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                          </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="exampleInputEmail1">相册名称</label>
                                    <input type="text" name="name" class="form-control"  placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">排序</label>
                          <div class="row">
                            <div class="col-xs-2">
                              <input type="index" class="form-control" name="index" value="0">
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