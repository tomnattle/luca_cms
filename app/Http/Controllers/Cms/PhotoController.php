<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Photo;
use App\Cms\ArticleGroup;
use App\Cms\Album;
use App\Cms\Company;
use App\Cms\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public $module = 'album';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $g_id = $request->has('g_id') ? (int)$request->input('g_id') : 0;
        $a_id = $request->has('a_id') ? (int)$request->input('a_id') : 0;
        $keywords = $request->has('keywords') ? (int)$request->input('keywords') : '';
        
        $groups = ArticleGroup::where('site_id', $request->user()->getSite()['id'])
            ->where('model_type', ArticleGroup::ALBUM)
            ->paginate(30);
        $photoCats = [];
        if($g_id)
           $photoCats = Photo::where('site_id', $request->user()->getSite()['id'])
            ->where('g_id', $g_id)
            ->paginate(30);
                
        $photos = Photo::where('site_id', $request->user()->getSite()['id']);
        if($g_id)
            $photos = $photos->where('g_id', $g_id);
        if($a_id)
            $photos = $photos->where('a_id', $a_id);
        if($keywords)
            $photos = $photos->where('name', 'like', '%'. $keywords .'%');

        $photos = $photos->paginate(15);
        return View('cms.photo.index', [
                'photos' => $photos,
                'groups' => $groups,
                'photoCats' => $photoCats,
                'a_id' => $a_id,
                'g_id' => $g_id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $albums = Album::where('site_id', $request->user()->getSite()['id'])
            //->where('g_id', 0)
            ->get();
        $groups = ArticleGroup::where('model_type', ArticleGroup::ALBUM)
            ->where('site_id', $request->user()->getSite()['id'])
            ->orderBy('created_at', 'desc')
            ->orderBy('index', 'desc')
            ->get();
        return View('cms.photo.create', [
                'groups' => $groups,
                'albums' => $albums
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
        $photo = new Photo;
        $photo->name = $request->has('name') ? $request->input('name') : '';
        $photo->desc = $request->has('desc') ? $request->input('desc') : '';
        $photo->index = $request->has('index') ? $request->input('index') : 0;
        $photo->g_id = $request->has('g_id') ? $request->input('g_id') : 0;
        $photo->a_id = $request->has('a_id') ? $request->input('a_id') : 0;
        $photo->u_id = $request->user()->id;
        $photo->site_id = $request->user()->getSite()['id'];
        if($request->hasFile('file')) {
            $photo->file = $request->file->store('images');
            $file = new File();
            $file->name = $photo->file;
            $file->hash = md5_file(storage_path('/app/public/' .$photo->file));
            $file->u_id = $request->user()['id'];
            $file->save();
        }
        $photo->save();
        return  redirect()->route('photos.index', ['a_id'=> $photo->a_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Photo $photo)
    {
        if($photo->site_id !=  $request->user()->getSite()['id'])
            throw new \Exception("unvlid operate");
        $photo->delete();
        if($request->ajax()){
            return $photo->id;
        }
    }
}
