<?php

namespace App\Http\Controllers\AdminAuth;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\secretary;
use App\Models\doctor;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminAuth\Logout;
class LoginController extends Controller
{
    // use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::DASHBOARD;

    public function showLogin()
    {
        return view('adminAuth.login');
    }



     public function login(LoginRequest $request)
    {
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

            return redirect()->route('admin.dashboard');

        }
        else if(auth()->guard('secretary')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

            return redirect()->route('admin.dashboard');

        }
        else if(auth()->guard('doctor')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

            return redirect()->route('admin.dashboard');

        }
        if(auth()->guard('paramedic')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

            return redirect()->route('admin.dashboard');

        }
        return redirect()->back() -> with(["error" => 'invalid account' , "input" => $request->all()]);
        // return with(["error" => 'invalid account' , "input" => $request->all()]);

    }


    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     $admin = admin::where('email', $credentials['email'])->first();

    //     if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
    //         return response()->json([
    //             'error' => 'invalid account',
    //             'input' => $request->all()
    //         ], 401);
    //     }

    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         return redirect()->route('admin.dashboard');
    //     } elseif (Auth::guard('secretary')->attempt($credentials)) {
    //         return redirect()->route('admin.dashboard');
    //     } elseif (Auth::guard('doctor')->attempt($credentials)) {
    //         return redirect()->route('doctors.dashboard');
    //     } elseif (Auth::guard('paramedic')->attempt($credentials)) {
    //         return redirect()->route('admin.dashboard');
    //     } else {
    //         return response()->json([
    //             'error' => 'invalid account',
    //             'input' => $request->all()
    //         ], 401);
    //     }
    // }

    // في حال عدم الدخول إلى dashboard يجب إيفاف هذا الكود
    public function __construct()
    {
     $this->middleware('guest:admin')->except('logout');
    }
    // protected function loggedOut(Request $request)
    // {
    //     return redirect('/admin/login');
    // }


    // public function logout()
    // {
    //     Auth::guard('admin')->logout();

    //     return redirect('/admin/login');
    // }
    public function logout()
{
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');

    } else if (Auth::guard('secretary')->check()) {
        Auth::guard('secretary')->logout();
        return redirect('/admin/login');

    }else if (Auth::guard('doctor')->check()) {
        Auth::guard('doctor')->logout();
        return redirect('/admin/login');

    }else if (Auth::guard('paramedic')->check()) {
        Auth::guard('paramedic')->logout();
        return redirect('/admin/login');
    }
}

}
