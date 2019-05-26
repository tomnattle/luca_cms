<?php

namespace App\Http\Middleware;

use Closure;
use App\UserVisite as UserVisiteModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class UserVisite
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
        $u_id = 0;
        $site = $request->attributes->get('site');
        if($request->user()){
            $u_id = $request->user()->id;
        }
        if(!$request->session()->has('visite_id')){
            $request->session()->put('visite_id', Uuid::uuid1()->toString());
        }
        $userVisite = new UserVisiteModel();
        $userVisite->session_id = $request->session()->get('visite_id');
        $userVisite->u_id = $u_id;
        $userVisite->site_id = $site->id;
        $userVisite->ip = $request->getClientIp();
        $userVisite->ipint = ip2long($userVisite->ip);
        $userVisite->referer_url = $request->server('HTTP_REFERER');
        $userVisite->url = $request->getRequestUri();
        $userVisite->error = '';
        $userVisite->post_data = json_encode($request->all());
        $userVisite->save();
        return $next($request);
    }
}
