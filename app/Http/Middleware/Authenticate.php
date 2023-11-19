<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Middleware\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request as HttpRequest;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('admin.login');
        // }

        if (Auth::guard('secretary')->check() || Auth::guard('doctor')->check() || Auth::guard('paramedic')->check()) {
            return route('admin.login');
        }else{
            return route('login');
        }
    }
}
