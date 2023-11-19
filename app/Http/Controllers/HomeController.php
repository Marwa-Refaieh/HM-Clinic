<?php

namespace App\Http\Controllers;

use App\Models\ambulance_order;
use App\Models\appointment;
use App\Models\doctor;
use App\Models\device;
use App\Models\article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('demo.index');
    }

    public function get_info(){
        // عرض الأجهزة
        $devices = device::all();
        // جلب عدد الزيارات من الجلسة
        $visits = session()->get('visits', 0);
        // زيادة عدد الزيارات بمقدار 1
        $visits++;
        // حفظ عدد الزيارات الجديد في الجلسة
        session()->put('visits', $visits);
        $latestArticles = article::orderBy('created_at', 'desc')->take(3)->get();
        $patient = appointment::distinct()->select('fname' , 'lname' , 'birth')->get();
        $data['patient'] = $patient->count();
        $data['doctor'] = doctor::select(DB::raw('COUNT(doctors.id) as doctor'))->first()->doctor;
        $data['ambulance'] = ambulance_order::where('status' , 2)->select(DB::raw('COUNT(id) as ambulance'))->first()->ambulance;

        // return $data;
        return view('demo.index' , compact('devices','visits','data','latestArticles'));
    }

    public function help(){
        return Carbon::now()->format('Y-m-d H:i:s');
    }
}
