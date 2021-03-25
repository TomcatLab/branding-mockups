<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null){
        $is_admin = $request->session()->get('is_admin', false);

        //if($guard == "admin" && Auth::guard($guard)->check()) {
        if(!$is_admin){
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
