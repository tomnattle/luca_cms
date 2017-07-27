<?php

namespace App\Http\Controllers\Cms;

use App\Cms\Group;
use App\Cms\File;
use App\Cms\Album;
use App\Cms\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public $module = 'album';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $g_id = $request->has('g_id') ? $request->input('g_id') : '';

        $albums = Album::where('cmp_id', $request->user()->getCompany()['id']);
        if($g_id)
             $albums = $albums->where('g_id', $g_id);
        $albums = $albums->paginate(16);
        
        if($request->ajax()){
            return $albums;
        }

        $groups = Group::where('cmp_id', $request->user()->getCompany()['id'])
            ->where('model_type', Group::ALBUM)
            ->paginate(30);

        return View('cms.album.index', [
                'albums' => $albums,
                'groups' => $groups,
                'g_id' => $g_id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $groups = $groups = Group::where('cmp_id', $request->user()->getCompany()['id'])
            ->where('model_type', Group::ALBUM)
            ->paginate(30);
        ;
        return View('cms.album.create', [
               'groups' => $groups,
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
        $album = new Album;
        $album->cmp_id =  $request->user()->getCompany()['id'];
        $album->uid =  $request->user()['id'];
        $album->g_id = $request->has('g_id') ? $request->input('g_id') : '';
        $album->name = $request->has('name') ? $request->input('name') : '';
        $album->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $album->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $album->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$album->cover));
            $file->uid = $request->user()['id'];
            $file->save();
        }
        $album->save();
        return  redirect()->route('albums.index', ['g_id' => $album['g_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Album $album)
    {
        $groups = $groups = Group::where('cmp_id', $request->user()->getCompany()['id'])
            ->where('model_type', Group::ALBUM)
            ->paginate(30);
        ;
        return View('cms.album.edit', [
               'groups' => $groups,
               'album' => $album
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->g_id = $request->has('g_id') ? $request->input('g_id') : '';
        $album->name = $request->has('name') ? $request->input('name') : '';
        $album->index = $request->has('index') ? $request->input('index') : 0;
        if($request->hasFile('cover')) {
            $album->cover = $request->cover->store('images');
            $file = new File();
            $file->name = $album->cover;
            $file->hash = md5_file(storage_path('/app/public/' .$album->cover));
            $file->uid = $request->user()['id'];
            $file->save();
        }
        $album->save();
        
        return  redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Album $album)
    {
        $album->delete();
        if($request->ajax()){
            return $album->aid;
        }
    }

    public function setCover(Request $request, $photoId){
        $photo = Photo::findOrFail($photoId);
        if ($photo['a_id']){
            $album = Album::findOrFail($photo['a_id']);
            $album->cover = $photo->file;
            $album->save();
            return $album['aid'];
        }else{
            return '';
        }
    }    
}
