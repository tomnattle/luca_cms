<?php

namespace App\Http\Middleware;

use Closure;
use \App\Utilities\Encrypt;

class Comment
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
        //验证加密信息
        if(!$request->has('comment_flg'))
            throw new \Exception("param error");
           
        $data = Encrypt::DecryptWithOpenssl($request->input('comment_flg'));
        $data = explode('|', $data);
       
        if($request->func_id != $data[0] || $request->site_id != $data[1] || $request->target_id != $data[2])
            throw new \Exception("param unvalid");
            
        return $next($request);
    }
}
