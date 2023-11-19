<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, ...$guards)
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             if($guard == 'User')
    //                 return redirect(RouteServiceProvider::HOME);
    //             else
    //                 return redirect(RouteServiceProvider::DASHBOARD);
    //         }
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, ...$guards)
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::guard($guard)->user();
            if($user instanceof User){
                return redirect(RouteServiceProvider::HOME);
            } else if($user instanceof Doctor || $user instanceof Secretary || $user instanceof Paramedic) {
                return redirect('/admin/login');
            } else {
                abort(403); // لا يحق للمستخدم الوصول إلى الصفحة المطلوبة
            }
        }
    }

    return $next($request);
}
}
