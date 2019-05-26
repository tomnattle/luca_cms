@extends('layouts.im')
@section('content')
<input id="chat_flg" type="hidden"></input>
@include('im.menu')

<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group chat-list" >
					
				</ul>
			</div>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div data-spy="scroll" data-target="#navbar-example2" id="chat-window" data-offset="0" class="scrollspy－chat">
							
						</div>
					</div>
				</div>
				<!-- Single button -->
				<!--
				<div class="btn-group" style="margin-top:-20px;">
						<span class="glyphicon glyphicon-picture " class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
						<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
						</ul>
				</div>
				-->
				<div class="row">
					<div class="col-md-10" >
						<textarea class="form-control" id="ipt_msg" rows="3"></textarea>
					</div>
					<div class="col-md-2" >
						<button type="submit" id="chat-send" class="btn btn-info" style="width: 100%; height: 80px">发 送</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection