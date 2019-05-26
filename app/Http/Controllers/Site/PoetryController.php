<?php

namespace App\Http\Controllers\Site;

use Log;
use Hashids;
use App\Site\Poetry;
use App\Site\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepositoryInterface;

class PoetryController extends Controller
{   
    protected $module = 'poetry';
    const SEARCH_PREFIX = 'potry_search';
    public function index(Request $request, $key = null, $value = null){
        $search = [];
        $poetries = new Poetry();
        $author = null;
        //搜索
        if($request->has('keywords')){
            $keywords = $request->input('keywords');
            $author = Author::where('name', $keywords)->first();
            if($author){
                $search['author'] = $value;
                $poetries = $poetries->where('author_id', $author['id']);
            }else{
                $poetries = $poetries->where('name', 'like', '%' . $keywords . '%');
                $poetries = $poetries->orWhere('tags', 'like', '%' . $keywords . '%');
                $poetries = $poetries->orWhere('content', 'like', '%' . $keywords . '%');
            }
            $search['keywords'] = $request->input('keywords');
        }elseif($key == 'ages'){
            $age_id = array_search($value, Config('age'));
            if(!$age_id)
                throw new \Exception("age_id unvalid");
            $poetries = $poetries->where('age_id', $age_id);
            $search['age'] = $value;
        }elseif ($key == 'authors') {
            $author = Author::where('name', $value)->first();
            if($author){
                $poetries = $poetries->where('author_id', $author['id']);
            }else{
                throw new \Exception("author not found");
            }
            $search['author'] = $value;
        }else{
            if((int)$request->input('page') > 1 ){
                throw new \Exception("fuck spider", 1);
            }
        }
        
        $poetries = $poetries->paginate(10);
        if (isset($search['keywords'])) {
           $poetries->appends(['keywords' => $search['keywords']]);
        }
        
        return View('front.poetry.index', [
            'poetries' => $poetries,
            'search' => $search,
            'author' => $author,
        ]);
    }

    public function show(Request $request, CommentRepositoryInterface $commentRepository, $potryid){
        $poetry = Poetry::findOrFail(Hashids::decode($potryid)[0]);

        $poetry->view_count = $poetry->view_count + 1;
        $poetry->save();

        return View('front.poetry.show',[
            'poetry' => $poetry,
            'user' => $request->user(),
            'mycomment' => $request->user() ?$commentRepository->fetchOne(CommentRepositoryInterface::KEY_POETRY_PORTRY, 0, $poetry->id, $request->user()->id) : null,
            'comments' => $commentRepository->fetch(CommentRepositoryInterface::KEY_POETRY_PORTRY, 0, 0, $poetry->id)
        ]);
    }
    
    /**
    public function like(Request $request, $potryid){
        $poetry = Poetry::findOrFail((int)Hashids::decode($potryid));
        $poetry->like_count = $poetry->like_count + 1;
        $poetry->view_count = $poetry->view_count - 1;
        $poetry->save();
        return redirect()->back();
    }   
    **/

}
