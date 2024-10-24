<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin extends Middleware {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, ...$guards) {
        if(Auth::user() && Auth::user()->is_admin == 1 && Auth::user()->last_admin_authenticated) {
            return $next($request);
        }
        
        return redirect('/auth/access/admin/login')->with('error', 'You don\'t have admin access');
    }
}
