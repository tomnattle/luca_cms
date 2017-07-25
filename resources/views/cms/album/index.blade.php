@extends('layouts.cms')
@section('content')
                 

                <div class="panel panel-default">
                  <div class="panel-heading">
                       <a href="{{url('home/article-cats/create')}}" type="button" class="btn btn-primary">
                      上传照片 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

                      <a href="{{url('home/albums/create')}}" type="button" class="btn btn-primary">
                      新增相册 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                  </div>
                  <div class="panel-body">
                    <div class="row album">
                     @foreach ($albums as $album)
                      <div class="col-md-3">
                       
                        @if($album['cover'])
                         <img src="{{URL::asset('storage/' .$album['cover'])}}" alt="..." class="img-thumbnail" />
                        @else
                        <img src="{{URL::asset('/images/default.png')}}" alt="..." class="img-thumbnail" />
                        @endif
                        
                        <a href="">{{str_limit($album['name'], 12, '...')}}</a>
                      </div>
                      @endforeach
                    </div>
                    {!! $albums->links() !!}
                  </div>
                </div>
@endsection