<?php

namespace App\Http\Middleware;
use App\Cms\Site;
use Closure;

class Front
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
        try{
            $site = Site::where('en_name', $request->route('siteName'))->firstOrFail();
            $request->attributes->add(compact('site'));
        }catch(\Exception $e){
            abort(404, 'Unauthorized action.');
        }
        
        return $next($request);
    }
}
