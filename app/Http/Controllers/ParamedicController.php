<?php

namespace App\Http\Controllers;

use App\Models\paramedic;
use App\Http\Requests\StoreparamedicRequest;
use App\Http\Requests\UpdateparamedicRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class ParamedicController extends Controller
{
    public function index()
    {
        $paramedics = paramedic::select('id' , 'fname' , 'lname' , 'email', 'password' , 'photo' , 'phone_number' , 'gender' , 'car_number' , 'birth')
        ->get();
        $data = [];
        foreach($paramedics as $paramedic){
            $age = $paramedic->age;
            array_push($data , ["paramedic" => $paramedic , "age" => $age]);
        }

        // return $data;
        return view('dashboard.employees.paramedics' , compact('paramedics'));

        // redirect()->route('/')->with(['success' => "success"]);
    }
    public function index_all()
    {
        $paramedics = paramedic::select('id' , 'fname' , 'lname' , 'email', 'password' , 'photo' , 'phone_number' , 'gender' , 'car_number' , 'birth')
        ->get();
        $data = [];
        foreach($paramedics as $paramedic){
            $age = $paramedic->age;
            array_push($data , ["paramedic" => $paramedic , "age" => $age]);
        }

        return $paramedics;

        // return view('dashboard.employees.paramedics' , compact('paramedics'));

        // redirect()->route('/')->with(['success' => "success"]);
    }
    public function store(StoreparamedicRequest $request)
    {
        $photo_path = uploadImage('paramedics' , $request->photo);
        $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');

        $paramedic = paramedic::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'birth' => $birth,
            'photo' => $photo_path,
            'gender' => $request->gender,
            'car_number' => $request->car_number,
        ]);

        if($paramedic){
            // return "done";
            return response()->json([
                'status' => true,
                'msg' => 'Add paramedic',
                'data' => $paramedic,
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add paramedic'
            ]);
        }
        // redirect()->route('/')->with(['success' => "success"]);
    }

    public function show(paramedic $paramedic)
    {
        $data['paramedic'] = $paramedic->selection($paramedic);
        $data['age'] =  $paramedic->age;

        // return $data;
        return response()->json($data);

        // redirect()->route('/')->with(['success' => "success"]);
    }
    public function update(UpdateparamedicRequest $request, paramedic $paramedic)
    {
        if($request->has('fname'))
            $paramedic->update([ 'fname' => $request->fname]);
        if($request->has('lname'))
            $paramedic->update([ 'lname' => $request->lname]);
        if($request->has('email'))
            $paramedic->update([ 'email' => $request->email]);
            if ($request->has('password')) {
                $hashedPassword = bcrypt($request->password);
                $paramedic->update(['password' => $hashedPassword]);
            }
        if($request->has('phone_number'))
            $paramedic->update([ 'phone_number' => $request->phone_number]);
        if($request->has('birth')){
            $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');
            $paramedic->update([ 'birth' => $birth]);
        }
        if($request->has('gender'))
            $paramedic->update([ 'gender' => $request->gender]);
        if($request->has('photo')){
            $photo_path = uploadImage('paramedics' , $request->photo);
            $paramedic->update([ 'photo' => $photo_path]);
        }
        if($request->has('car_number'))
            $paramedic->update([ 'gender' => $request->car_number]);

        return $paramedic;
        // return redirect()->route('/')->with(['success' => "success"]);
    }

    public function destroy(paramedic $paramedic)
    {
        $paramedic->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Add paramedic'
        ]);return "done";
        // return redirect()->route('/')->with(['success' => "success"]);
    }
}
