<?php
namespace App\Repositories\Cms;
use App\Cms\Article;

class ArticleRepository{

    public function test(){
        return 1;
    }

    public function getList($cmp_id, $g_id, $c_id, $page = 1, $page_num = 15){
        $articles = Article::where('cmp_id',$cmp_id)
            ->where('g_id',$g_id);
            
        if($c_id){
            $articles = $articles->where('c_id',$c_id);
        }

        $articles = $articles->paginate(15);
        return $articles;
    }

    public function get($id){
        $article = Article::findOrFail($id);
        return $article;
    }
}
