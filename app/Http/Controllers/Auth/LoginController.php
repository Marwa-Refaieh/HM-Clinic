<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
        return redirect('/home');
    }
    public function login(LoginRequest $request)
    {
        if(auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect()->route('home');
        }
        return redirect()->back() -> with(["error" => 'invalid account']);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function isRole(string $role): bool
    // {
    //     return $this->role === $role;
    // }
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');

    //     $this->middleware(function ($request, $next) {
    //         if (Auth::check()) {
    //             $user = Auth::user();
    //             if ($user->isRole('user')) {
    //                 return redirect('/home');
    //             } else {
    //                 Auth::logout();
    //                 return redirect('/login');
    //             }
    //         }
    //         return $next($request);
    //     });
    // }
        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Auth::guard('web')->logout();
        // return redirect('/home');

        if (Auth::guard('web')->check()) {
             Auth::guard('web')->logout();
             return redirect('/home');

        }
    }
}
