<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Job;
use App\Cms\JobCat;
use App\Cms\JobGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JobController extends Controller
{
    public $module = 'job';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $is_show = (int)$request->input('is_show', -1);
        $jobs = Job::where('site_id', $request->user()->getSite()['id']);
        if($is_show != -1)
            $jobs->where('is_show', $is_show);
        $jobs = $jobs->orderby('is_show', 'desc')
            ->orderby('id', 'desc')
            ->paginate($request->input('page_size',15));
        $jobs->appends(['is_show' => $is_show]);
        return View('cms.job.index', [
            'is_show' => $is_show,
            'jobs' => $jobs
        ]);
    }

    public function cats(Request $request, $gid){
        $result = ['data' => JobCat::select('id', 'name')->where('g_id', $gid)->get()];
        return $result;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        return View('cms.job.create', [

        ]);
    }
    public function onoff(Request $request)
    {
        $state = $request->input('state','');
        $ids = $request->input("ids", []);
        if(!is_array($ids) || count($ids) > 15)
            throw new \Exception("ids not valid");
        if($state == '上线')
        {
            Job::whereIn('id', $ids)
              ->where('site_id', $request->user()->getSite()['id'])
              ->update(['is_show' => 1]);
        }elseif($state == '下线')
        {
            Job::whereIn('id', $ids)
                ->where('site_id', $request->user()->getSite()['id'])
                ->update(['is_show' => 0]);
        }else{
            throw new \Exception('unkown state');
        }

        return redirect()->route('jobs.index', [
            'is_show' => $request->input('is_show', -1),
            'page' => $request->input('page', 1)
        ]);
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $job = new Job();
        $job->site_id = $request->user()->getSite()['id'];
        $job->g_id = (int)$request->input('g_id', 0);
        $job->c_id = (int)$request->input('c_id', 0);
        $job->name = $request->has('name') ? $request->input('name') : '未命名';
        $job->department = $request->has('department') ? $request->input('department') : '未命名';
        $job->degree = $request->has('degree') ? $request->input('degree') : 0;
        $job->experience = $request->has('experience') ? $request->input('experience') : 0;
        $job->salary_down = $request->has('salary_down') ? $request->input('salary_down') : 0;
        $job->salary_up = $request->has('salary_up') ? $request->input('salary_up') : 0;
        $job->desc = $request->has('desc') ? $request->input('desc') : '';
        $job->site_id = $request->user()->getSite()['id'];
        $job->is_show = 1;
        $job->save();
        return redirect()->route('jobs.index');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Cms\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        throw new \Exception("access denied.");
    }

    public function resume()
    {
        return View('cms.resume.index', [

        ]);
    }

    public function resumeRecieve()
    {
        return View('cms.resume.recieve', [

        ]);
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Cms\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $request, Job $job)
    {
        if($job->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        return View('cms.job.edit', [
            'job' => $job
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Cms\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Job $job)
    {   
        if($job->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");

        if($request->has('department'))
            $job->department = $request->input('department');
        if($request->has('degree'))
            $job->degree = $request->input('degree');
        if($request->has('experience'))
            $job->experience = $request->input('experience');
        if($request->has('salary_down'))
            $job->salary_down = $request->input('salary_down');
        if($request->has('salary_up'))
            $job->salary_up = $request->input('salary_up');
        if($request->has('desc'))
            $job->desc = $request->input('desc');
        
        $job->save();
        return redirect()->route('jobs.edit', ['id' => $job->id]);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Cms\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request)
    {

    }
}
