<?php

namespace App\Http\Controllers\Cms;

use App\Cms\File;
use App\Cms\FileFolder;
use Illuminate\Http\Request;
use App\Http\Requests\Cms\StoreFileFolder;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;


class FileFolderController extends Controller
{
    public $module = 'file';

    public function index()
    {
    	$folders = FileFolder::orderBy('id', 'desc')->get();
        return View('cms.folder.index', [
        	'folders' => $folders
        ]);
    }

    public function store(StoreFileFolder $request)
    {   
        if($request->ajax()){
            if(FileFolder::where('u_id', $request->user()->id)->count() >= 30){
                throw new ApiException("文件夹创建数量到达上限");
            }
            $folder = new FileFolder();
            $folder->name = $request->input('name');
            $folder->u_id = $request->user()->id;
            $folder->save();
            return ['id' => $folder->id];
        }
    }

    public function update(StoreFileFolder $request, FileFolder $folder){
        if($request->ajax()){
            if($folder->u_id != $request->user()->id)
                throw new ApiException("无权访问改资源" . $request->user()->id . $folder->u_id);
            $folder->name = $request->input('name');
            $folder->save();
            return ['id' => $folder->id];
        }
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
                if(File::whereIn('f_id', $ids)->where('u_id', $request->user()->id)->count() > 0){
                    throw new \Exception("请先删除文件后，在删除对应的文件夹");
                }
                FileFolder::whereIn('id', $ids)->where('u_id', $request->user()->id)->delete();
                return '';
            }catch(\Exception $e){
                throw new ApiException($e->getMessage());
                
            }
        }
    }
}
