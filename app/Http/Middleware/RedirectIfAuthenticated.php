<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check()) {
            $token = auth('api')->login($user);
            return redirect(RouteServiceProvider::HOME)
                    ->header('X-Token', $token)
                    ->header('asdfas', 'sadfasdf');
        }
        return $next($request);
    }
}
