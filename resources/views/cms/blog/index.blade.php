@extends('layouts.cms')
@section('content')
<ul class="context-nav">
	<li class="active"><a href="{{url('/home/blogs')}}">博客<span class="sr-only">(current)</span></a></li>
</ul>
<div class="panel panel-default" id="blog">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<form action="/home/blogs" method="post">
					<div class="form-group">
						<input type="hidden" name="_method" value="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="page" value="{{ Request()->input('page', 1) }}">
						<div class="row">
							<div class="col-md-10">
								<textarea name="content"  class="form-control" style="height:77px;"></textarea>
							</div>
							<div class="col-md-2">
								<button class="btn btn-info pull-right" style="height:77px;width:100%">发布</button>
							</div>
						</div>
					</div>
				</form>
				@foreach ($blogs as $id => $blog)
				<?php
				$extras = [];
				foreach ($blogExtras as $key => $blogExtra) {
					if($blogExtra['id'] === $blog->id)
						$extras = $blogExtra;
				}
				?>
				<div class="panel panel-default" >
					<div class="panel-body">
						<div>
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object header" src="/images/header.png" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{{$blog['created_at']}}</h4>
									<span class='viewtime-1'>浏览{{$blog['view_count']}}次</span> <span class='viewtime-1'>评论{{$blog['comment_count']}}次</span> <span class='viewtime-1'>点赞{{$blog['like_count']}}次</span>
								</div>
							</div>
						</div>
						<div class='blog-item'>{{$blog['content']}}</div>
						<form action="/home/blogs/{{$blog['id']}}/like" method="post" >
							<input type="hidden" name="_method" value="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="page" value="{{ Request()->input('page', 1) }}">
							<button type="submit" class="btn btn-link" aria-label="Left Align">
							<span class="glyphicon glyphicon-thumbs-up" ></span></div>
							</button>
						</form>
						<div>
						</div>
						<div class="panel-footer">
							@if($blog->comment_count > 0)
							<?php
							$comments = json_decode($extras['comments'], 1);
							?>
							<div class="panel panel-default blog-comment">
								<div class="list-group">
									@foreach($comments as $comment)
									<a href="#" class="list-group-item blog-comment-item">
										<img class="media-object header-mini" title="{{$comment['nick']}}" src="/images/header.png" alt="...">
									{{$comment['content']}}</a>
									@if(isset($comment['sub']))
									@foreach($comment['sub'] as $subComment)
									<a href="#" class="list-group-item blog-sub-comment-item">
										<img class="media-object header-mini" title="{{$comment['nick']}}" src="/images/header.png" alt="...">
									{{$subComment['content']}}</a>
									@endforeach
									@endif
									@endforeach
								</div>
							</div>
							@endif
							<form action="/home/blogs/{{$blog['id']}}/comment" method="post">
								<input type="hidden" name="_method" value="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="pid" value="0">
								<input type="hidden" name="page" value="{{ Request()->input('page', 1) }}">
								<div class="form-group">
									<input class="form-control" name="comment" ></input>
								</div>
								<div class="form-group clearfix hide">
									<button class="btn btn-info pull-right">发布</button>
								</div>
							</form>
						</div>
					</div>
					@endforeach
					{!!$blogs->links()!!}
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<table width="100%">
								<tr>
									<td>浏览次数</td>
									<td>点赞次数</td>
									<td>评论次数</td>
								</tr>
								<tr>
									<td>{{@$report->blog_view_today}}/{{@$report->blog_view}}</td>
									<td>{{@$report->blog_like_today}}/{{@$report->blog_like}}</td>
									<td>{{@$report->blog_comment_today}}/{{@$report->blog_comment}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection