<?php

namespace App\Http\Controllers\Cms;

use DB;
use App\Cms\Report;
use App\Cms\Blog;
use App\Cms\BlogExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{
    public $module = 'blog';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $u_id = $request->user()->id;
        $blogs = Blog::where('site_id', $request->user()->getSite()['id'])
             ->orderBy('id', 'desc')
             ->paginate(10);
        
        $blogExtras = BlogExtra::whereIn('id', array_column($blogs->toArray()['data'], 'id'))->get();
       
       
        $report = $request->user()->getReport();
		return View('cms.blog.index', [
            'blogs' => $blogs,
            'blogExtras' => $blogExtras->toArray(),
            'report'=> $report
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('content') || trim($request->input('content')) == '')
            throw new \Exception("param content not found");
        try{
            DB::beginTransaction();
            $blog = new Blog();
            $blog->site_id = $request->user()->getSite()['id'];
            $blog->u_id = $request->user()->id;
            $blog->content = $request->input('content');
            $blog->rank = 0;
            $blog->view_count = 0;
            $blog->comment_count = 0;
            $blog->like_count = 0;
            $blog->tip_off_count = 0;
            $blog->is_show = 1;
            $blog->save();

            $blogExtra = new BlogExtra();
            $blogExtra->id = $blog->id;
            $blogExtra->comments = '[]';
            $blogExtra->likes = '[]';
            $blogExtra->tip_offs = '[]';
            $blogExtra->views = '[]';
            $blogExtra->save();
            DB::commit();
            return redirect()->route('blogs.index');
        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Comment the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $blogid)
    {
        $comment = $request->input('comment','');
        $pid = (int)$request->input('pid', 0);
        $pid = 0;
        $u_id = $request->user()->id;
        if(empty($comment))
            throw new \Exception("param comment cannotby empty");
        $blog = Blog::findOrFail($blogid);
        if(($blog->site_id != $request->user()->getSite()['id']) || ($blog->u_id != $u_id))
            throw new \Exception("access refuse");
        $blogExtra = BlogExtra::select('id','comments')->findOrFail($blogid);
        $comments = json_decode($blogExtra->comments, TRUE);
        $count = count($comments);
        try{
            DB::beginTransaction();
            $comment = [
                'pid' => 0,
                'nick' => $request->user()->name,
                'u_id' => $u_id,
                'content' => $comment,
                'created_at' => date('Y-m-d H:i:s'),
                'is_show' => 1
            ];
            if($pid == 0){
                $comments[$count] = $comment;
            }else{
                if(!isset($comments[$pid]) || $comments[$pid]['is_show'] === 0)
                    throw new \Exception("parent comment not exist or deleted");
                $comments[$pid]['sub'][] = $comment;
            }

            $blogExtra->comments = json_encode($comments);
            $blogExtra->save();
            $blog->comment_count += 1;
            $blog->save();
            $report = Report::findOrFail($u_id);
            $report->blog_comment += 1;
            $report->blog_comment_today += 1;
            $report->save();
            DB::commit();
            return redirect()->route('blogs.index', ['page' => $request->input('page', 1)]);
        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }

    public function like(Request $request, $blogid)
    {
        $u_id = $request->user()->id;
        $blog = Blog::findOrFail($blogid);
        if(($blog->site_id != $request->user()->getSite()['id']) || ($blog->u_id != $u_id))
            throw new \Exception("access refuse");
        $blogExtra = BlogExtra::select('id','likes')->findOrFail($blogid);
        $likes = json_decode($blogExtra->likes, TRUE);
        try{
            DB::beginTransaction();
            $like = [
                'nick' => $request->user()->name,
                'u_id' => $u_id,
                'created_at' => date('Y-m-d H:i:s'),
                'is_cancel' => 0
            ];
            if(isset($likes[$u_id])){
                $likes[$u_id]['is_cancel'] = $likes[$u_id]['is_cancel'] ^ 1;
            }else{
                $likes[$u_id] = $like;
            }
            $blogExtra->likes = json_encode($likes, 1);
            $blogExtra->save();
            $report = Report::findOrFail($u_id);
            if($likes[$u_id]['is_cancel'] == 1){
                $blog->like_count -= 1;
                $report->blog_like -= 1;
                $report->blog_like_today -= 1;
            }else{
                $blog->like_count += 1;
                $report->blog_like += 1;
                $report->blog_like_today += 1;
            }
            $blog->save();

            $report->save();
            DB::commit();
            return redirect()->route('blogs.index', ['page' => $request->input('page', 1)]);
        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Article $article)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {

    }
}
