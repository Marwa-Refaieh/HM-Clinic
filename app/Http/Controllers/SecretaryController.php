<?php

namespace App\Http\Controllers;

use App\Models\secretary;
use App\Http\Requests\StoresecretaryRequest;
use App\Http\Requests\UpdatesecretaryRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SecretaryController extends Controller
{
    //view the secretarys page in dashboard
    // public function index_page(){
    //     return view('dashboard.employees.secretarys');
    // }

    public function index_all()
    {
        $secretaries = secretary::select('id' , 'fname' , 'lname' , 'photo' , 'phone_number' , 'gender' , 'birth', 'email' , 'password')
        ->get();
        // $data = [];
        // foreach($secretaries as $secretary){
        //     $age = $secretary->age();
        //     array_push($data , ["secretary" => $secretary , "age" => $age]);
        // }

        return $secretaries;
        // return response()->json($secretaries);
        // return view('dashboard.employees.secretarys' , compact('secretaries'));


        // redirect()->route('/')->with(['success' => "success"]);
    }

    public function index()
    {
        $secretaries = secretary::select('id' , 'fname' , 'lname' , 'photo' , 'phone_number' , 'gender' , 'birth', 'email' , 'password')
        ->get();

        return view('dashboard.employees.secretarys' , compact('secretaries'));

    }

    public function store(StoresecretaryRequest $request)
    {
        $photo_path = uploadImage('secretaries' , $request->photo);
        $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');

       $secretary = secretary::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'birth' => $birth,
            'photo' => $photo_path,
            'gender' => $request->gender,
        ]);

        if($secretary){
            // return "done";
            return response()->json([
                'status' => true,
                'msg' => 'Add secretary',
                'data' => $secretary,
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add secretary'
            ]);
        }

    }

    public function show(secretary $secretary)
    {
        $data['secretary'] = $secretary->selection($secretary);
        $data['age'] =  $secretary->age;

        return response()->json($data);
        // return $data;
        // if($secretary){
        //     // return "done";
        //     return response()->json([
        //         'status' => true,
        //         'msg' => 'Add secretary'
        //     ]);
        // }else {
        //     return response()->json([
        //         'status' => false,
        //         'msg' => 'not Add secretary'
        //     ]);
        // }
    }

    public function update(UpdatesecretaryRequest $request, secretary $secretary)
    {
        if($request->has('fname'))
            $secretary->update([ 'fname' => $request->fname]);
        if($request->has('lname'))
            $secretary->update([ 'lname' => $request->lname]);
        if($request->has('email'))
            $secretary->update([ 'email' => $request->email]);
            if ($request->has('password')) {
                $hashedPassword = bcrypt($request->password);
                $secretary->update(['password' => $hashedPassword]);
            }
        if($request->has('phone_number'))
            $secretary->update([ 'phone_number' => $request->phone_number]);
        if($request->has('birth')){
            $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');
            $secretary->update([ 'birth' => $birth]);
        }
        if($request->has('gender'))
            $secretary->update([ 'gender' => $request->gender]);
        if($request->has('photo')){
            $photo_path = uploadImage('secretaries' , $request->photo);
            $secretary->update([ 'photo' => $photo_path]);
        }

        // return $secretary;
        return response()->json($secretary);

        // return redirect()->route('/')->with(['success' => "success"]);
    }
    public function destroy(secretary $secretary)
    {
        $secretary->delete();
        // return "done";
        //  secretary::find($secretary->id)->delete();

         return response()->json([
                'status' => 'success',
                'msg' => 'Add secretary'
            ]);

        // redirect()->route('/')->with(['success' => "success"]);
    }
}
