<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use App\Cms\File;
use App\Utilities\Image;
use config;
use Storage;

class AfterUpload
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //$data = json_decode(urldecode($response), 1);
        $data = json_decode((string)$response->getContent());
        if($request->isMethod('post') && $data->state == 'SUCCESS'){
            $path = public_path() . $data->url;
            Image::resize($path, Image::TYPE_FIXED_WIDTH, Storage::disk('public'), [
                'name' => $data->title,
                'width' => 800,
            ]);

            $filename_thumbnail = 'thumbnail/' . $data->title;
            Image::resize($path, Image::TYPE_THUMBNAIL, Storage::disk('public'), [
                'name' => $filename_thumbnail,
                'width' => 250,
                'height' => 200,
            ]);
            
            $file = new File();
            $file->u_id = $request->user()->id;
            $file->f_id = 0;
            $file->size = $data->size;
            $file->type = 1;
            $file->minetype = '';
            $file->name = $data->title;
            $file->thumbnail = $filename_thumbnail;
            $file->disk = 'public';
            $file->tag = '';
            $file->hash = md5_file($path);
            $file->save();
        }

        return $response;
    }
}
