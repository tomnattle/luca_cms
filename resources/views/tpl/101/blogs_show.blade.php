@extends('tpl.101.layout')
@section('left-side')
@endsection
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
    <input class="btn btn-info" type="button" value="返回"  onclick="window.history.back()">
    </h3>
  </div>
  <div class="panel-body">
    <article>
      <header>
        <h3>{{ $article->title }}</h3>
        <small>{{ @$article->extra['sub-title'] }}</small>
        <p >更新日期：<time pubdate="pubdate">{{ date('Y-m-d', strtotime($article->updated_at)) }}</time></p>
      </header>
      <div class="">
        <img src="{{url('storage/' . $article['cover'])}}" width="100%;">
        <p>{!! $article->context !!}</p></div>
        <section>
        </section>
        <footer>
          <p><small>Copyright @ {{ config('app.name', 'Laravel') }}.net All Rights Reserverd</samll></p>
        </footer>
      </article>
      <div class="panel panel-info" id="article-comment-form" >
        <div class="panel-heading ">
          评论
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-10">
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-2">
              <input style="width: 100%; height: 80px;" type="submit" class="btn btn-info" name="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('right-side')
  @endsection