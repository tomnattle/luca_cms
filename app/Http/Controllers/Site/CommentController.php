<?php

namespace App\Http\Controllers\Site;

use App\Site\Comment;
use App\Site\Mark;
use App\Exceptions\ApiException;
use App\Http\Requests\Site\StoreComment;
use App\Http\Requests\Site\EditComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepositoryInterface;
/**
* 需要评论的表必须包含后面的字段：{like_count dislike_count tip_count comment_count}
**/
class CommentController extends Controller
{
    protected $module = 'comment';

    const MARK_LIKE = 1;
    const MARK_DISLIKE = 2;
    const MARK_TIP = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,CommentRepositoryInterface $commentRepository)
    {   
        return null;
    }

    public function list(Request $request,CommentRepositoryInterface $commentRepository)
    {   
        try{
            if($request->ajax()){
                if(!isset(Config('funcs')[$request->input('func_id')]))
                    throw new \Exception('unkown func_id');

                $up_id = (int)$request->input('up_id');
                $func_id = Config('funcs')[$request->input('func_id')]['id'];
                $site_id = $request->input('site_id');
                $target_id = $request->input('target_id'); 
                return $commentRepository->fetch($func_id, $up_id, $site_id, $target_id);
            }
        }catch(\Exception $e){
            //throw new ApiException();
            throw $e;
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return null;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        try{
            if($request->ajax()){
                if(!isset(Config('funcs')[$request->input('func_id')]))
                    throw new \Exception('unkown func_id');

                $user = $request->user()->getExtra();
                $comment = new Comment();
                $comment->user_id = $user['id'];
                $comment->user_nick = $user['nick'];
                $comment->user_icon = $user['icon'];
                $comment->use_signature = $user['signature'];

                //todo 如果是某个子站点中的评论 当在自站点中 因该有对应session 需要检测 session的 site_id是否和当前的传递值的session_id 保持一致
                $comment->site_id = (int)$request->input('site_id');
                
                $comment->func_id = Config('funcs')[$request->input('func_id')]['id'];
                $comment->target_id = (int)$request->input('target_id');
                $comment->up_id = $request->has('up_id') ? $request->input('up_id') : 0;

                $comment->sub_count = 0;
                $comment->like_count = 0;
                $comment->dislike_count = 0;
                $comment->tip_count = 0;
                $comment->content = $request->input('content');

                $upComment = null;
                if($comment->up_id === '0'){
                    $target = Config('funcs')[$request->input('func_id')]['model']([]);
                    $target = $target->findOrFail($comment->target_id);
                    $target->comment_count += 1;
                    $target->save();

                    $old_comment = Comment::where('site_id', $comment->site_id)
                        ->where('func_id', $comment->func_id)
                        ->where('target_id', $comment->target_id)
                        ->where('up_id', 0)
                        ->where('user_id', $user['id'])
                        ->first();
                    if($old_comment){
                        throw new \Exception("您已经回答过该问题");
                    }
                }else{
                    $comment->up_id = (int)$comment->up_id;
                    $upComment = Comment::findOrFail($comment->up_id);
                    if($upComment->site_id != $comment->site_id)
                        throw new \Exception("unvalid request");
                    $upComment->sub_count += 1;
                }
                
                $comment->save();
                if($upComment)
                    $upComment->save();

                return $comment;
            }
        }catch(\Exception $e){
            //throw new ApiException();
            throw $e;
            
        }
    }

    
    // 标志 某个功能 某个评论
    public function mark(Request $request){
        try{
            if(!$request->has('func_id') || !isset(Config('funcs')[$request->input('func_id')]))
                throw new \Exception('unkown func_id');
            $func_id = $request->input('func_id');
            if(!$request->has('comment_id'))
                throw new \Exception('unkown comment_id');
            $comment_id = $request->input('comment_id') == '0' ? 0 : (int)$request->input('comment_id');
            if($comment_id > 0){
                $func_id = 'comment.comment';
            }
            $user = $request->user()->getExtra();
            $mark = new Mark();
            $mark->kind = (int)$request->input('kind_id');
            if(!in_array($mark->kind, [static::MARK_LIKE, static::MARK_DISLIKE]))
                throw new \Exception('unkown kind');
            $mark->comment_id = $comment_id;
            $mark->user_id = $user['id'];
            $mark->site_id = (int)$request->input('site_id');
            $mark->func_id = Config('funcs')[$func_id]['id'];
            $mark->target_id = $request->input('target_id');

            if($request->has('to_id')){
                $mark->to_id = $request->input('to_id');
                $mark->to_user_id = $request->input('to_user_id');
                $mark->to_user_nick = $request->input('to_user_nick');
            }
            if(!isset(Config('funcs')[$func_id]))
                throw new \Exception('unkown func_id');
            $target = Config('funcs')[$func_id]['model']([]);

            if($mark->comment_id == 0){
                $target = $target::findOrFail($mark->target_id);
            }else{
                $target = $target::findOrFail($mark->comment_id);
            }
            
            if($mark->kind == static::MARK_LIKE){
                $target->like_count += 1;
            }elseif ($mark->kind == static::MARK_DISLIKE) {
                $target->dislike_count += 1;
            }elseif ($mark->kind == static::MARK_TIP) {
                $target->tip_count += 1;
            }else{
                throw new \Exception("unkown kind");
            }
            $old_mark = Mark::where('kind', $mark->kind)
                ->where('user_id', $user['id'])
                ->where('site_id', $mark->site_id)
                ->where('func_id', $mark->func_id)
                ->where('target_id', $mark->target_id)
                ->where('comment_id', $mark->comment_id)
                ->first();
            if($old_mark){
                throw new \Exception("您已经操作过了", 2);
            }
            $mark->save();
            $target->save();
        }catch(\Exception $e){
            throw new ApiException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditComment $request, Comment $comment)
    {
        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditComment $request, $domain, $id)
    {
        if($request->ajax()){
            $comment = Comment::findOrFail($id);
            
            if($comment['user_id'] != $request->user()->id)
                throw new \Exception("access denied");
            $comment->content = $request->input('content');
            $comment->save();
            return $request->input('id');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return null;
    }
}
