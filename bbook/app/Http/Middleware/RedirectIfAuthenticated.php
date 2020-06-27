<?php

namespace bbook\Http\Middleware;

use bbook\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect(RouteServiceProvider::ADMIN);
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect(RouteServiceProvider::DASHBOARD);
                }                        
                break;
        }

        return $next($request);
    }
}
