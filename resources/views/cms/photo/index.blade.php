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
                       <a href="{{url('/home/albums')}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 返回</a>
                       <a href="{{url('home/photos/create')}}" type="button" class="btn btn-primary">
                      上传照片 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

                  </div>

                  <div class="panel-body">

                    <div class="row">
                     @foreach ($photos as $photo)
                      <div class="col-md-2">
                        <div class="thumbnail">
                        @if($photo['file'])
                          <img src="{{URL::asset('storage/' .$photo['file'])}}" alt="..." />
                        @else
                          <img src="{{URL::asset('/images/default.png')}}" alt="..."  />
                        @endif
                         <div class="dropdown" class="pull-right" style="position: absolute; right: 30px; top: 5px;">
                              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <span class="glyphicon glyphicon-triangle-bottom"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a class="btn btn-link bt_del_photo" data-id="{{$photo['pid']}}" href="javascript:void(0)">删除</a></li>
                                <li><a class="btn btn-link bt_set_album_cover" data-id="{{$photo['pid']}}" >设置为封面</a></li>
                              </ul>
                            </div>
                             
                            @if($photo['name'])
                              {{str_limit($photo['name'], 12, '...')}}
                              @else
                              未命名
                              @endif
                        </div>
                      </div>
                      @endforeach
                    </div>
                    {!! $photos->links() !!}
                  </div>
                </div>

@endsection