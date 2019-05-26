<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Job;
use App\Cms\Resume;
use App\Cms\JobCat;
use App\Cms\JobGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ResumeController extends Controller
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
        $resumes = Resume::where('site_id', $request->user()->getSite()['id']);
        if($is_show != -1)
            $resumes->where('is_show', $is_show);
        $resumes = $resumes->orderby('is_show', 'desc')
            ->orderby('id', 'desc')
            ->paginate($request->input('page_size',15));
        $resumes->appends(['is_show' => $is_show]);
        return View('cms.resume.index', [
            'is_show' => $is_show,
            'resumes' => $resumes
        ]);
    }

    public function jobApply()
    {
        return View('cms.job.apply', [

        ]);
    }

    public function onoff(Request $request)
    {
        $state = $request->input('state','');
        $ids = $request->input("ids", []);
        if(!is_array($ids) || count($ids) > 15)
            throw new \Exception("ids not valid");
        if($state == '展示')
        {
            Resume::whereIn('id', $ids)
              ->where('site_id', $request->user()->getSite()['id'])
              ->update(['is_show' => 1]);
        }elseif($state == '关闭')
        {
            Resume::whereIn('id', $ids)
                ->where('site_id', $request->user()->getSite()['id'])
                ->update(['is_show' => 0]);
        }else{
            throw new \Exception('unkown state');
        }
        return redirect()->route('resumes.index', [
            'is_show' => $request->input('is_show', -1),
            'page' => $request->input('page', 1)
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        $userExtra = $request->user()->getExtra();
        $groups = JobGroup::all();
        return View('cms.resume.create', [
            'userExtra' => $userExtra,
            'groups' => $groups
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
        $resume = new Resume();
        $resume->u_id = $request->user()->id;
        $resume->site_id = $request->user()->getSite()['id'];
        $resume->g_id = (int)$request->input('g_id', 0);
        $resume->c_id = (int)$request->input('c_id', 0);
        $resume->title = $request->input('title', '');
        $resume->keywords = $request->input('keywords', '');
        $resume->name = $request->input('name', '');
        $resume->en_name = $request->input('en_name', '');
        $resume->school = $request->input('school', '');
        $resume->degree = $request->input('degree', '');
        $resume->company = $request->input('company', '');
        $resume->department = $request->input('department', '');
        $resume->experience = $request->input('experience', '');
        $resume->salary_up = (int)$request->input('salary_up', 0);
        $resume->salary_down = (int)$request->input('salary_down', 0);
        $resume->desc = $request->input('desc', '');
        $resume->skill = $request->input('skill', '');
        $resume->note = $request->input('note', '');
        $resume->major = $request->input('major', '');
        $resume->marry = $request->input('marry', '');
        $resume->sex = $request->input('marry', '');
        $resume->age = $request->input('age', '');
        $resume->phone = $request->input('phone', '');
        $resume->weixin = $request->input('weixin', '');
        $resume->mail = $request->input('mail', '');
        $resume->language = $request->input('language', '');
        $resume->address = $request->input('address', '');
        $resume->address_expected = $request->input('address_expected', '');
        $resume->is_show = 1;
        $resume->save();
        return redirect()->route('resumes.index');
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
    public function edit(Request $request, Resume $resume)
    {   
        if($request->user()->getSite()['id'] != $resume->site_id)
            throw new \Exception("unvalid operate");
        $userExtra = $request->user()->getExtra();
        $groups = JobGroup::all();
        return View('cms.resume.edit', [
            'resume' => $resume,
            'userExtra' => $userExtra,
            'groups' => $groups
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Cms\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Resume $resume)
    {
        if($request->user()->getSite()['id'] != $resume->site_id)
            throw new \Exception("unvalid operate");
        $resume->g_id = (int)$request->input('g_id', 0);
        $resume->c_id = (int)$request->input('c_id', 0);
        $resume->title = $request->input('title', '');
        $resume->keywords = $request->input('keywords', '');
        $resume->name = $request->input('name', '');
        $resume->en_name = $request->input('en_name', '');
        $resume->school = $request->input('school', '');
        $resume->degree = $request->input('degree', '');
        $resume->company = $request->input('company', '');
        $resume->department = $request->input('department', '');
        $resume->experience = $request->input('experience', '');
        $resume->salary_up = (int)$request->input('salary_up', 0);
        $resume->salary_down = (int)$request->input('salary_down', 0);
        $resume->desc = $request->input('desc', '');
        $resume->skill = $request->input('skill', '');
        $resume->note = $request->input('note', '');
        $resume->major = $request->input('major', '');
        $resume->age = $request->input('age', '');
        $resume->marry = $request->input('marry', '');
        $resume->sex = $request->input('marry', '');
        $resume->phone = $request->input('phone', '');
        $resume->weixin = $request->input('weixin', '');
        $resume->mail = $request->input('mail', '');
        $resume->language = $request->input('language', '');
        $resume->address = $request->input('address', '');
        $resume->address_expected = $request->input('address_expected', '');
        $resume->save();
        return redirect()->route('resumes.edit', ['id' => $resume->id]);
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
