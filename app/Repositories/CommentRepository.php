<?php
namespace App\Repositories;
use App\Site\Comment;

class CommentRepository implements CommentRepositoryInterface{

    public function fetch($func_id, $up_id = 0, $site_id = 0, $target_id = 0, $pageSize = 10){
        
        if($func_id <= 0)
            throw new \Exception("unkown func");

        if($target_id == 0)
            throw new \Exception("unkown target_id");

        $comment = new Comment();

        $comment = $comment->where('up_id', $up_id);

        if($site_id != 0)
            $comment = $comment->where('site_id', $site_id);
        
        $comment = $comment->where('func_id', $func_id);

        $comment = $comment->where('target_id', $target_id)->select(['id', 'user_id', 'user_nick', 'user_icon', 'site_id', 'func_id', 'target_id', 'up_id', 'use_signature', 'sub_count', 'like_count', 'dislike_count', 'tip_count', 'content', 'created_at', 'updated_at', 'deleted_at', 'to_id', 'to_user_id', 'to_user_nick']);

        return $comment->simplePaginate($pageSize);
    }

    public function fetchOne($func_id, $site_id = 0, $target_id = 0,  $user_id = 0){
        if($func_id <= 0)
            throw new \Exception("unkown func");

        if($user_id == 0)
            throw new \Exception("unkown user_id");

        if($target_id == 0)
            throw new \Exception("unkown target_id");

        $comment = new Comment();

        if($site_id != 0)
            $comment = $comment->where('site_id', $site_id);

        if($user_id != 0)
            $comment = $comment->where('user_id', $user_id);

        $comment = $comment->where('target_id', $target_id);
        return $comment->where('func_id', $func_id)->first();
    }
}
