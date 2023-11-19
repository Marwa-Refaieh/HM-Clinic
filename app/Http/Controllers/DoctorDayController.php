<?php

namespace App\Http\Controllers;

use App\Models\doctor_day;
use App\Http\Requests\Storedoctor_dayRequest;
use App\Http\Requests\Updatedoctor_dayRequest;

class DoctorDayController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Storedoctor_dayRequest $request)
    {
        doctor_day::create([
            'doctor_id' => $request->doctor_id,
            'day_id' => $request->day_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return "done";
        // redirect()->route('/')->with(['success' => "success"]);
    }
    public function show(doctor_day $doctor_day)
    {
        
    }

    public function update(Updatedoctor_dayRequest $request, doctor_day $doctor_day)
    {
        // if($request->has('doctor_id'))
        //     $doctor_day->update([ 'doctor_id' => $request->doctor_id]);
        // if($request->has('day_id'))
        //     $doctor_day->update([ 'day_id' => $request->day_id]);
        // if($request->has('start_time'))
        //     $doctor_day->update([ 'start_time' => $request->start_time]);
        // if($request->has('end_time'))
        //     $doctor_day->update([ 'end_time' => $request->end_time]);

        // return "done";
         // return redirect()->route('/')->with(['success' => "success"]);
    }

    public function destroy(doctor_day $doctor_day)
    {
        $doctor_day->delete();
        return "done";
        // return redirect()->route('/')->with(['data' => 'success']);
    }
}
