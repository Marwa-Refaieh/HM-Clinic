<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\device_order;
use App\Models\record;
use App\Http\Requests\StorerecordRequest;
use App\Http\Requests\UpdaterecordRequest;
use Symfony\Component\HttpFoundation\Request;

class RecordController extends Controller
{
    // public function index(appointment $appointment)
    // {
    //     // get record for patient
    //     // $patient = appointment::where('id' , $appointment->id)->get();
    //     $patients = appointment::where('fname' , $appointment->fname)
    //     ->where('lname' , $appointment->lname)
    //     ->where('birth' , $appointment->birth)
    //     ->where('gender' , $appointment->gender)
    //     ->where('doctor_id' , auth()->id()) // auth
    //     ->pluck('id');

    //     $records = record::whereIn('appointment_id' , $patients)
    //     ->where('doctor_id' , auth()->id())
    //     ->simplePaginate(1);

    //     return $records;

    // }
    public function index(appointment $appointment)
    {
        // get record for patient
        // $patient = appointment::where('id' , $appointment->id)->get();
        $patients = appointment::where('fname' , $appointment->fname)
        ->where('lname' , $appointment->lname)
        ->where('birth' , $appointment->birth)
        ->where('gender' , $appointment->gender)
        ->where('doctor_id' , auth()->id()) // auth
        ->pluck('id');

        $records = record::whereIn('appointment_id' , $patients)
        ->where('doctor_id' , auth()->id())
        ->latest()
        ->take(3)
        ->get();

        return $records;
    }
    // public function get_last(appointment $appointment){
    //     $records = record::where('appointment_id' , $appointment->id)
    //     ->where('doctor_id' , auth()->id()) // auth
    //     ->last();

    //     return $records;
    //     return response()->json($data);

    // }
    public function get_last(appointment $appointment){
        $patients = appointment::where('fname' , $appointment->fname)
       ->where('lname' , $appointment->lname)
       ->where('birth' , $appointment->birth)
       ->where('gender' , $appointment->gender)
       ->where('doctor_id' , auth()->id()) // auth
       ->pluck('id');

        $record =record:: whereIn('appointment_id' , $patients)
            ->where('doctor_id', auth()->id())
            ->latest()
            ->first();

        return response()->json($record);
    }


    // public function store(StorerecordRequest $request , appointment $appointment)
    // {

    //     $records = record::create([
    //         'doctor_id' => $request->doctor_id,//auth()->id()
    //         'appointment_id' => $appointment->id,
    //         'blood_pressure_rate' => $request->blood_pressure_rate,
    //         'heart_rate' => $request->heart_rate,
    //         'respiratory_rate' => $request->respiratory_rate,
    //         'saturation_rate' => $request->saturation_rate,
    //         'story' => $request->story,


    //         'blood_pressure' => ($request->has('blood_pressure') ? $request->blood_pressure : 0),
    //         'asthma' => ($request->has('asthma') ? $request->asthma : 0),
    //         'diabetes' => ($request->has('diabetes') ? $request->diabetes : 0),
    //         'heart_disease' => ($request->has('heart_disease') ? $request->heart_disease : 0),
    //         'renal_disease' => ($request->has('renal_disease') ? $request->renal_disease : 0),
    //         'tumors' => ($request->has('tumors') ? $request->tumors : 0),
    //         'medicinal_history' => ($request->has('medicinal_history') ? $request->medicinal_history : null),
    //         'surgical_history'=> ($request->has('surgical_history') ? $request->surgical_history : null),
    //         'headache' => ($request->has('headache') ? $request->headache : 0),
    //         'chest_pain' => ($request->has('chest_pain') ? $request->chest_pain : 0),
    //         'cough' => ($request->has('cough') ? $request->cough : 0),
    //         'dizziness' => ($request->has('dizziness') ? $request->dizziness : 0),
    //         'dyspnea' => ($request->has('dyspnea') ? $request->dyspnea : 0),
    //         'abdominal_pain' => ($request->has('abdominal_pain') ? $request->abdominal_pain : 0),
    //         'constipation' => ($request->has('constipation') ? $request->constipation : 0),
    //         'vomiting' => ($request->has('vomiting') ? $request->vomiting : 0),
    //         'arthralgia' => ($request->has('arthralgia') ? $request->arthralgia : 0),
    //         'diarhea' => ($request->has('diarhea') ? $request->diarhea : 0),
    //         'diagnosis' => $request->diagnosis,
    //         'medicinal_analysis' => ($request->has('medicinal_analysis') ? $request->medicinal_analysis : null),
    //     ]);

    //     if($records){
    //         // return "done";
    //         return response()->json([
    //             'status' => true,
    //             'msg' => 'Add record'
    //         ]);
    //     }else {
    //         return response()->json([
    //             'status' => false,
    //             'msg' => 'not Add record'
    //         ]);
    //     }

    // }

    public function store(StorerecordRequest $request , appointment $appointment)
     {

     $records = record::create([
     'doctor_id' => $request->doctor_id,//auth()->id()
     'appointment_id' => $appointment->id,
     'blood_pressure_rate' => $request->blood_pressure_rate,
     'heart_rate' => $request->heart_rate,
     'respiratory_rate' => $request->respiratory_rate,
     'saturation_rate' => $request->saturation_rate,
     'story' => $request->story,


     'blood_pressure' => ($request->has('blood_pressure') ? $request->blood_pressure : 0),
     'asthma' => ($request->has('asthma') ? $request->asthma : 0),
     'diabetes' => ($request->has('diabetes') ? $request->diabetes : 0),
     'heart_disease' => ($request->has('heart_disease') ? $request->heart_disease : 0),
     'renal_disease' => ($request->has('renal_disease') ? $request->renal_disease : 0),
     'tumors' => ($request->has('tumors') ? $request->tumors : 0),
     'medicinal_history' => ($request->has('medicinal_history') ? $request->medicinal_history : null),
     'surgical_history'=> ($request->has('surgical_history') ? $request->surgical_history : null),
     'headache' => ($request->has('headache') ? $request->headache : 0),
     'chest_pain' => ($request->has('chest_pain') ? $request->chest_pain : 0),
     'cough' => ($request->has('cough') ? $request->cough : 0),
     'dizziness' => ($request->has('dizziness') ? $request->dizziness : 0),
     'dyspnea' => ($request->has('dyspnea') ? $request->dyspnea : 0),
     'abdominal_pain' => ($request->has('abdominal_pain') ? $request->abdominal_pain : 0),
     'constipation' => ($request->has('constipation') ? $request->constipation : 0),
     'vomiting' => ($request->has('vomiting') ? $request->vomiting : 0),
     'arthralgia' => ($request->has('arthralgia') ? $request->arthralgia : 0),
     'diarhea' => ($request->has('diarhea') ? $request->diarhea : 0),
     'diagnosis' => $request->diagnosis,
     'medicinal_analysis' => ($request->has('medicinal_analysis') ? $request->medicinal_analysis : null),
     ]);


    if($request->has('device_id')){
     $patiant = appointment::where('id' , $request->appointment_id)->first();
    $fname = $patiant->fname;
    $lname = $patiant->lname;
    $phone_number = $patiant->phone_number;
     $device_order = device_order::create([
     'record_id' => $records->id,
     'device_id' => $request->device_id,
     'secretary_id' => null ,
     'fname' => $fname ,
     'lname' => $lname,
     'phone_number' => $phone_number,
     'status' => 0,
     ]);
    }
     if($records){

      return response()->json([
     'status' => true,
     'msg' => 'Add record'
     ]);
     }else {
     return response()->json([
     'status' => false,
     'msg' => 'not Add record'
     ]);
     }

     }

    public function show(record $record)
    {
        $device = device_order::where('record_id' , $record->id)->get();
        $data['record'] = $record;
        $data['device'] = $device;
        return $data;

    }
    public function update(UpdaterecordRequest $request, record $record)
    {
        $record->update([
            'blood_pressure_rate' => ($request->has('blood_pressure_rate') ? $request->blood_pressure_rate : $record->blood_pressure_rate),
            'heart_rate' => ($request->has('heart_rate') ? $request->heart_rate : $record->heart_rate),
            'respiratory_rate' => ($request->has('respiratory_rate') ? $request->respiratory_rate : $record->respiratory_rate),
            'saturation_rate' => ($request->has('saturation_rate') ? $request->saturation_rate : $record->saturation_rate),
            'story' => ($request->has('story') ? $request->story : $record->story),
            'blood_pressure' => ($request->has('blood_pressure') ? $request->blood_pressure : $record->blood_pressure),
            'asthma' => ($request->has('asthma') ? $request->asthma : $record->asthma),
            'diabetes' => ($request->has('diabetes') ? $request->diabetes : $record->diabetes),
            'heart_disease' => ($request->has('heart_disease') ? $request->heart_disease : $record->heart_disease),
            'renal_disease' => ($request->has('renal_disease') ? $request->renal_disease : $record->renal_disease),
            'tumors' => ($request->has('tumors') ? $request->tumors : $record->tumors),
            'medicinal_history' => ($request->has('medicinal_history') ? $request->medicinal_history : $record->medicinal_history),
            'surgical_history'=> ($request->has('surgical_history') ? $request->surgical_history : $record->surgical_history),
            'headache' => ($request->has('headache') ? $request->headache : $record->headache),
            'chest_pain' => ($request->has('chest_pain') ? $request->chest_pain : $record->chest_pain),
            'cough' => ($request->has('cough') ? $request->cough : $record->cough),
            'dizziness' => ($request->has('dizziness') ? $request->dizziness : $record->dizziness),
            'dyspnea' => ($request->has('dyspnea') ? $request->dyspnea : $record->dyspnea),
            'abdominal_pain' => ($request->has('abdominal_pain') ? $request->abdominal_pain : $record->abdominal_pain),
            'constipation' => ($request->has('constipation') ? $request->constipation : $record->constipation),
            'vomiting' => ($request->has('vomiting') ? $request->vomiting : $record->vomiting),
            'arthralgia' => ($request->has('arthralgia') ? $request->arthralgia : $record->arthralgia),
            'diarhea' => ($request->has('diarhea') ? $request->diarhea : $record->diarhea),
            'diagnosis' => ($request->has('diagnosis') ? $request->diagnosis :$record->diagnosis) ,
            'medicinal_analysis' => ($request->has('medicinal_analysis') ? $request->medicinal_analysis : $record->medicinal_analysis),
        ]);

        if($record){
            // return "done";
            return response()->json([
                'status' => true,
                'msg' => 'Add record'
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add record'
            ]);
        }
    }
    public function destroy(record $record)
    {
        $record->delete();
        return "done";
    }
}
