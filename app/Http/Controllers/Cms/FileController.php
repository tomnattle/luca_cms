<?php

namespace App\Http\Controllers\Cms;

use App\Cms\File;
use App\Cms\FileFolder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{

    public $module = 'file';

    const VIEW_MODE_KEY = 'file_view_mode';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $fid = 0;
        $typeid = 0;
        $folder = null; 
        if($request->session()->has(self::VIEW_MODE_KEY)){
            $mode = $request->session()->get(self::VIEW_MODE_KEY);
        }else{
            $mode = 'li';
        }
        
        $files = File::where('u_id', $request->user()->id);

        if($request->has('f_id') && (int)$request->input('f_id') > 0){
            $fid = (int)$request->input('f_id');
            $folder = FileFolder::findOrFail($fid);
            if($folder->u_id != $request->user()->id){
                throw new \Exception("access denied");
            }
            $files = $files->where('f_id', $fid);
        }
        if($request->has('type_id') && (int)$request->input('type_id') > 0){
            $typeid = (int)$request->input('type_id');
        }
        $files->orderBy('id', 'desc');
        $files = $files->paginate(30);
        
        return View('cms.file.index', [
            'fid' => $fid,
            'typeid' => $typeid,
            'folder' => $folder,
            'folders' => FileFolder::where('u_id', $request->user()->id)->get(),
            'files' => $files,
            'mode' => $mode,
        ]);
    }
    

    public function setViewMode(Request $request){
        $mode = $request->input('mode', 'li');
        if(!in_array($mode, ['th','li'])){
            $mode = 'li';
        }
        $request->session()->put(self::VIEW_MODE_KEY, $mode);
        return ['mode' => $mode];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function delMuti(Request $request){
        if($request->ajax()){
            try{
                if(!$request->has('ids')){
                    throw new \ApiException("param error");
                }
                $ids = [];
                foreach($request->input('ids') as $id) {
                   $ids[] = (int) $id;
                }
                File::whereIn('id', $ids)->where('u_id', $request->user()->id)->delete();
                return '';
            }catch(\Exception $e){
                throw new ApiException($e->getMessage());
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cms\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cms\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cms\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
