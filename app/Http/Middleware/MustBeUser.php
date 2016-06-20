<?php

namespace App\Http\Middleware;

use Closure;

class MustBeUser
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
        $user=$request->user();
        if($user){

            // if($user->isAdmin()){
            //     return redirect('/admin');
            // }
            //else 
                //if($user->isUser() || $user->isAdmin()){
            if($user->role=="User" ){
                
                return $next($request);
            }
        }
        else{
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
            //return redirect()->guest('login');
        }
    }
}
