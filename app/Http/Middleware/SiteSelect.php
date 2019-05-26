<?php

namespace App\Http\Middleware;

use Closure;

class SiteSelect
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
        $siteId = session('site_id');
        if((int)$siteId == 0)
            return redirect('/home/sites');
        return $next($request);
    }
}
