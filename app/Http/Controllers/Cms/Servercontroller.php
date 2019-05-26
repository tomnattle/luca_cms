<?php

namespace App\Http\Controllers\Cms;

use App\Cms\File as FileModel;
use App\Cms\FileFolder;
use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoragServerUpload;
use App\Utilities\Image;

class Servercontroller extends Controller
{
    protected $module = 'server';
    public function uploads(StoragServerUpload $request){
        if($request->ajax()){
            try{
                if(!$request->file('qqfile'))
                    throw new \Exception("no file upload");
                
                $file = Input::file('qqfile');
                //print_r($file->getSize());
                $path = ($file->getPath() . DIRECTORY_SEPARATOR . $file->getFileName());
                $hash =  md5_file($path);
                $_file = FileModel::where('hash', $hash)->first();

                $fileModel = new FileModel();
                $fid = 0;
                if($request->has('f_id') && (int) $request->input('f_id') != 0 ){
                    $folder = FileFolder::findOrFail((int) $request->input('f_id'));
                    if($folder->u_id != $request->user()->id){
                        throw new \Exception("f_id unvlid");
                    }
                    $fid = $folder->id;
                }

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $mineType = $file->getClientMimeType();
                
                if($_file){
                    $fileModel->name = $_file->name;
                    $fileModel->thumbnail = $_file->thumbnail;
                }else{
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $extension;
                    Storage::disk('public')->put($filename, File::get($file));
                    $filename_thumbnail = 'thumbnail/' . $filename;
                    Image::resize($path, Image::TYPE_THUMBNAIL, Storage::disk('public'), [
                        'name' => $filename_thumbnail,
                        'width' => 250,
                        'height' => 200,
                    ]);

                    $fileModel->name = $filename;
                    $fileModel->thumbnail = $filename_thumbnail;
                }
                
                $fileModel->hash = $hash;
                $fileModel->size = $file->getSize();
                $fileModel->type = 1;
                $fileModel->disk = 'public';
                $fileModel->tag = '';
                
                $fileModel->minetype = $mineType;
                $fileModel->u_id = $request->user()->id;
                $fileModel->f_id = $fid;
                $fileModel->save();
                //return $fileModel;
                return [
                    "success" => true, 
                    "uuid" => $request->input('qquuid')
                ];
            }catch(\Exception $e){
                return [
                    "success" => false, 
                    "uuid" => $request->input('qquuid'),
                    'message' => $e->getMessage(),
                ];
            }
            
        }
        
    }
}
