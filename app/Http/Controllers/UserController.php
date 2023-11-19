<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreuserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function login(LoginRequest $request)
    {
        if(auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect()->route('home');
        }
        return redirect()->back() -> with(["error" => 'invalid account']);
    }

    public function store(StoreuserRequest $request)
    {
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return "done";
        // redirect()->route('/')->with(['success' => "success"]);
    }
    public function checkLogin()
    {
        // التحقق من حالة تسجيل الدخول باستخدام الوسيط auth
        if (Auth::check()) {
            // إذا تم تسجيل الدخول، إرجاع الرد بنجاح
            return response()->json(['status' => 'success']);
        } else {
            // إذا لم يتم تسجيل الدخول، إرجاع الرد بخطأ
            return response()->json(['status' => 'error', 'message' => 'يجب تسجيل الدخول أولاً!']);
        }
    }

    public function getUserId(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();
            return response()->json(['user_id' => $user_id]);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
        return "done";
        // redirect()->route('/')->with(['success' => "success"]);
    }
}
