@include('UEditor::head')
<?php
$comment_flg = App\Utilities\Encrypt::EncryptWithOpenssl($func_id . '|' . $site_id . '|' . $target_id);
?>
<input type="hidden" id="comment_flg" value="{{ $comment_flg }}">

<input type="hidden" id="func_id" value="{{ $func_id }}">
<input type="hidden" id="site_id" value="{{ $site_id }}">
<input type="hidden" id="target_id" value="{{ $target_id }}">
<input type="hidden" id="comment_id" value="@if($mycomment){{ ($mycomment->id) }}@else{{ 0 }}@endif">
<div class="panel panel-default">
    <div class="panel-body center-block">
        @if($mycomment)
        <button  data-toggle="collapse"  class="btn btn-primary" data-up-id="{{ 0 }}" type="button" href="#comment-collapse" aria-expanded="false" aria-controls="comment-collapse" ><span class="fa fa-commenting"></span>
        查看我的评论
        @else
        <button  data-toggle="collapse"  class="btn btn-success" data-up-id="{{ 0 }}" type="button" href="#comment-collapse" aria-expanded="false" aria-controls="comment-collapse" ><span class="fa fa-commenting"></span>
        发表评论
        @endif
        </button>
        <div class="collapse clearfix" id="comment-collapse">
            <script id="ipt_comment" name="ipt_comment" style="height:150px;" type="text/plain">@if($mycomment) {!! htmlspecialchars_decode($mycomment->content) !!}@endif</script>
            <button class="btn btn-info btn-comment pull-right" data-up-id="{{ 0 }}" type="button">
            @if($mycomment) 更新 @else 发布 @endif
            </button>
        </div>
        
    </div>
</div>
<div class="panel panel-default comment-panel">
    <div class="panel-heading">评论</div>
    <div class="panel-body">
        @foreach($comments as $comment)
        <div class="media">
            <div class="media-left">
                <a href="{{ env('APP_URL') }}/users/{{ ($comment->user_id) }}">
                    @if($comment['user_icon'] != '')
                    <img  class="media-object img-circle" src="{{url('storage/' . $comment['user_icon'])}}" alt="...">
                    @else
                    <img  class="media-object img-circle" src="/images/header.png" alt="...">
                    @endif
                </a>
            </div>
            <div class="media-body">
                <h5 class="media-heading">
                <a href="{{ env('APP_URL') }}/users/{{ ($comment->user_id) }}">
                    {{ $comment->user_nick }}
                </a>
                </h5>
                @if(strlen($comment->use_signature) > 0)
                {{str_limit($comment->use_signature, $limit = 40, $end = '...')}}
                @else
                暂无签名
                @endif
            </div>
            <div class="comment-content">
                <div class="created_at">发布于：{{ date('Y-m-d', strtotime($comment->created_at)) }}</div>
                {!! $comment->content !!}
                <?php 
                $comment_id = ($comment->id);
                ?>
                <div class="comment-bar">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span  role="button" data-toggle="collapse" href="#sub-comment-{{ $comment_id }}" aria-expanded="false" aria-controls="sub-comment-{{ $comment_id }}" class="fa fa-commenting"> {{ $comment['sub_count'] }}</span>
                    <span data-comment-id="{{ $comment_id }}" data-kind-id="1" class="btn-mark fa fa-thumbs-o-up" style="cursor: pointer;" > {{ $comment->like_count }}</span>
                    <span data-comment-id="{{ $comment_id }}" data-kind-id="2" class="btn-mark fa fa-thumbs-o-down" style="cursor: pointer;"> {{ $comment->dislike_count }}</span>
                    <!--<span class="fa fa-exclamation-triangle" style="color: red" title="举报"> {{ $comment['tip_count'] }}</span>-->
                </div>
            </div>
            <div class="panel sub-comment collapse"  data-target-list='#comment-list{{ $comment_id }}' data-up-id="{{ $comment_id }}" id="sub-comment-{{ $comment_id }}">
                <div class="panel-heading">共{{ $comment['sub_count'] }}条评论</div>
                <div class="panel-body">
                    
                    <div class="comment-comment-list" id="comment-list{{ $comment_id }}">
                        
                    </div>
                    <div class="loading-sub-comment"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
                    <div  class="load-more"><a   data-up-id='{{ $comment_id }}' data-target-list='#comment-list{{ $comment_id }}' href="javascript:void(0);">加载更多</a></div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="ipt_sub_comment_{{ $comment_id }}" placeholder="">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sub-comment" data-target="#ipt_sub_comment_{{ $comment_id }}" data-up-id='{{ $comment_id }}' data-target-list='#comment-list{{ $comment_id }}' type="button">评论</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $comments->links() }}
    </div>
</div>
<script type="text/javascript">
var ue = UE.getEditor('ipt_comment', {
initialFrameHeight:150,
toolbars:[['Undo', 'Redo','Bold','italic','test','insertunorderedlist','insertorderedlist','highlightcode','emotion']],
//autoClearinitialContent:true,
wordCount:false,
enterTag:'br',
elementPathEnabled:false,

});
ue.ready(function() {
ue.setHeight(150);
ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
});
</script>