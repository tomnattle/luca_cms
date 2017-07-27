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
                      

                       <div class="row">
                       <div class="col-md-9">
                           <a href="{{url('/home/photos/create')}}" type="button" class="btn btn-primary">
                            上传照片 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

                            <a href="{{url('/home/albums/create')}}" type="button" class="btn btn-primary">
                            新增相册 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                       </div>
                        <div class="col-md-3">
                            <select name="g_id" class="form-control" id ="select_group_album_reload" >
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
                     </div>
                  </div>
                  <div class="panel-body">
                    <div class="row album">
                     @foreach ($albums as $album)
                      <div class="col-md-3">
                        <div class="thumbnail">
                        @if($album['cover'])
                         <img src="{{URL::asset('storage/' .$album['cover'])}}" alt="..."  />
                        @else
                        <img src="{{URL::asset('/images/default.png')}}" alt="..." />
                        @endif
                              <div class="dropdown" class="pull-right" style="position: absolute; right: 30px; top: 5px;">
                              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <span class="glyphicon glyphicon-triangle-bottom"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="/home/albums/{{$album['aid']}}/edit" >编辑</a></li>
                                <li><a href="javascript:void(0)" class='bt_del_album' data-id="{{$album['aid']}}" >删除</a></li>
                              </ul>
                            </div>
                        <a href="{{url('home/photos?a_id='. $album['aid'])}}">
                        @if($album['name'])
                        {{str_limit($album['name'], 12, '...')}}
                        @else
                        未命名
                        @endif
                        </a>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    {!! $albums->links() !!}
                  </div>
                </div>
@endsection   