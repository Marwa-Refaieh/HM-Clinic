<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetDoctorTimeController extends Controller
{
    public function getTime(doctor $doctor , Request $request){
        $price = $doctor->avarage_price;
        $time = [];
        $doctor_day = null;
        $date = Carbon::createFromFormat('Y-m-d', "$request->date");

        $count = 0;
        $day = $date->format('l');
        // return $day;
        $arrays = $doctor->doctor_days()->get();
        foreach($arrays as $array){
            if($array->day()->where('name' , $day)->exists()){
                $doctor_day = $array;
                break;
            }
            $count++;
        }
        if($count == $arrays->count()){
            return "this day not available please choose another day";
        }

        if($doctor_day != null){
            $beginHour = Carbon::parse($doctor_day->start_time);
            $endHour = Carbon::parse($doctor_day->end_time);

            $appointments = appointment::where('date' , $date->format('Y-m-d'))
            ->where('doctor_id' , $doctor->id)
            ->get();

            $cur_time = $beginHour;
            while(true){
                $sum=0;

                foreach($appointments as $appointment){
                    if($cur_time->eq($appointment->time)){
                        break;
                    }
                    else{
                        $sum++;
                    }
                }

                if($sum == $appointments->count()){
                    array_push($time , date('H:i', strtotime($cur_time)));
                }

                $cur_time = $beginHour->addMinutes($doctor->avarage_treatment);
                if($cur_time->gt($endHour)){
                    break;
                }
            }
            // return $time ;
        return response()->json($time);

        // return view('demo.appointment' , compact('time','price'));

        }
    }

    // public function check_time(Request $request , doctor $doctor){
    //     $times = $this->getTime($doctor , $request);

    //     if(is_array($times)){
    //         $sum = 0;
    //         foreach($times as  $time){
    //             if($time->eq($request->time)){
    //                 break;
    //             }
    //             $sum++;
    //         }

    //         if($sum == count($times)){
    //             return true;
    //         }
    //         return false;
    //     }

    // }

}
