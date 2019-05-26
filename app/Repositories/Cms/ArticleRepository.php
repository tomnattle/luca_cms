<?php
namespace App\Repositories\Cms;
use App\Cms\Article;

class ArticleRepository{

    public function test(){
        return 1;
    }

    public function getList($site_id, $g_id, $c_id, $page_num = 15, $order = 'asc'){
        $articles = Article::where('site_id',$site_id)
            ->where('g_id',$g_id);

        if($c_id){
            $articles = $articles->where('c_id',$c_id);
        }

        $articles->orderBy('id', $order);

        $articles = $articles->paginate($page_num);
        return $articles;
    }

    public function get($id){
        $article = Article::findOrFail($id);
        return $article;
    }
}
