<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
    }



    // public function showLogin()
    // {
    //     return view('authDashboard.login');
    // }

    // public function login(LoginRequest $request)
    // {
    //     if(auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

    //         return redirect()->route('admin.dashboard');

    //     }
    //     else if(auth()->guard('secretary')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

    //         return redirect()->route('secretary.dashboard');

    //     }
    //     else if(auth()->guard('doctor')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

    //         return redirect()->route('doctor.dashboard');

    //     }
    //     if(auth()->guard('paramedic')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

    //         return redirect()->route('paramedic.dashboard');

    //     }
    //     return redirect()->back() -> with(["error" => 'invalid account' , "input" => $request->all()]);

    // }

    // public function store(StoreadminRequest $request)
    // {
    //     //
    // }
    // public function show(admin $admin)
    // {
    //     //
    // }

    // public function update(UpdateadminRequest $request, admin $admin)
    // {
    //     //
    // }
    // public function destroy(admin $admin)
    // {
    //     //
    // }

    
}
