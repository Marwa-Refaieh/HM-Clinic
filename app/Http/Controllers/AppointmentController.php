<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreappointmentRequest;
use App\Http\Requests\UpdateappointmentRequest;
use App\Models\doctor;
use App\Models\appointment;
use App\Models\User;
use App\Notifications\SendEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    public function index(doctor $doctor)
    {
      return view('demo.appointment' , compact('doctor'));
    }


    public function index_all(doctor $doctor)
    {
       // get appointment for specific doctor
        // clinic treatment
        $currentDate = date('Y-m-d');
        $patients = appointment::where('doctor_id', $doctor->id)
            ->where('remotely', 0)
            ->whereDate('date', $currentDate)
            ->orderBy('time', 'ASC')
            ->get();

            $allPatients = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 0)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();

            $destroyPatients = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 2)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();

        return view('dashboard.appointment.appointment', compact('patients','allPatients','destroyPatients'));
    }

    public function index_clinic_today(doctor $doctor)
    {
        $currentDate = date('Y-m-d');
        $patients = appointment::where('doctor_id', $doctor->id)
            ->where('remotely', 0)
            ->whereDate('date', $currentDate)
            ->orderBy('time', 'ASC')
            ->get();
        return response()->json(['appointments' => $patients]);
    }

    public function index_clinic_all(doctor $doctor)
    {
        $allPatients = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 0)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();
        return response()->json(['appointments' => $allPatients]);
    }

    public function index_remotly_today(doctor $doctor)
    {
        $currentDate = date('Y-m-d');
        $patients = appointment::where('doctor_id', $doctor->id)
            ->where('remotely', 1)
            ->whereDate('date', $currentDate)
            ->orderBy('time', 'ASC')
            ->get();
        return response()->json(['appointments' => $patients]);
    }

    public function index_remotly_all(doctor $doctor)
    {
        // get appointment for specific doctor
        // remotly treatment
        $allPatients = appointment::where('doctor_id' , $doctor->id)
        ->where('remotely' , 1)
        ->orderBy('date' , 'ASC')
        ->orderBy('time' , 'ASC')
        ->get();
        return response()->json(['appointments' => $allPatients]);
    }

    public function destroy_list_show(doctor $doctor)
    {
        $destroyPatients = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 2)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();
        return response()->json(['destroyPatients' => $destroyPatients]);
    }

    public function show_list(doctor $doctor, Request $request)
    {
        $date = $request->input('date');
        $appointments = appointment::where('doctor_id', $doctor->id)
            ->whereDate('date', $date)
            ->get();
        return response()->json(['appointments' => $appointments]);
    }



    public function index_psycholo(doctor $doctor)
    {
        $today = Carbon::today();
        $patients_remotly = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 1)
            ->whereDate('date', $today)
            ->orderBy('time' , 'ASC')
            ->get();

        $patients_clinic = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 0)
            ->whereDate('date', $today)
            ->orderBy('time' , 'ASC')
            ->get();

        $patients_remotly_all = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 1)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();

        $patients_clinic_all = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 0)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();

        $destroyPatients = appointment::where('doctor_id' , $doctor->id)
            ->where('remotely' , 2)
            ->orderBy('date' , 'ASC')
            ->orderBy('time' , 'ASC')
            ->get();
        // $all_patients = $patients_remotly_all->merge($patients_clinic_all);

        return view('dashboard.appointment.psychological', compact('patients_remotly', 'patients_clinic', 'patients_remotly_all','patients_clinic_all','destroyPatients'));
    }

    public function index_patient(doctor $doctor)
    {
        // get patients for specific doctor
        $patients = appointment::where('doctor_id', $doctor->id)
        ->select('fname', 'lname', 'address', 'gender', 'birth', 'phone_number', 'marital_status', DB::raw('MAX(id) as id'))
        ->groupBy('fname', 'lname', 'address', 'gender', 'birth', 'phone_number', 'marital_status')
        ->get();

        $today = Carbon::today();
        $patients_clinic = appointment::where('doctor_id' , $doctor->id)
        ->where('remotely' , 0)
        ->whereDate('date', $today)
        ->orderBy('time' , 'ASC')
        ->get();
        // return $patients;
        return view('dashboard.records.records' , compact('patients_clinic','patients'));
    }

    public function index_patient_psycholo(doctor $doctor)
    {
        // get patients for specific doctor
        $patients = appointment::where('doctor_id', $doctor->id)
        ->select('fname', 'lname', 'address', 'gender', 'birth', 'phone_number', 'marital_status','email', DB::raw('MAX(id) as id'))
        ->groupBy('fname', 'lname', 'address', 'gender', 'birth', 'phone_number', 'marital_status','email')
        ->get();

        $today = Carbon::today();
        $patients_remotly = appointment::where('doctor_id' , $doctor->id)
        ->where('remotely' , 1)
        ->whereDate('date', $today)
        ->orderBy('time' , 'ASC')
        ->get();

        $patients_clinic = appointment::where('doctor_id' , $doctor->id)
        ->where('remotely' , 0)
        ->whereDate('date', $today)
        ->orderBy('time' , 'ASC')
        ->get();
        return view('dashboard.records.psychology' , compact('patients_clinic','patients_remotly','patients'));
    }

    public function store(StoreappointmentRequest $request)
    {
        if($request->has('pricing'))
            $type=$request->pricing;
        else
            $type =0;
        if($request->has('remotely'))
            $remotely=$request->remotely;
        else
            $remotely =0;
        if($request->has('user_id'))
            $user_id=$request->user_id;
        else
            $user_id =null;

        $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');
        $date = Carbon::createFromFormat('m/d/Y' , $request->date)->format('Y-m-d');

        $appointment = appointment::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'time' => $request->time,
            'birth' => $birth,
            'date' => $date,
            'pricing' => $type,
            'doctor_id' => $request->doctor_id,
            'user_id' => $user_id,
            'remotely' => $remotely,
            'email' => ($request->has('email') ? $request->email : null),
        ]);


        if($appointment){
            // return "done";
            return response()->json([
                'status' => true,
                'msg' => 'Add appointment',
                'data' => $appointment,
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add appointment'
            ]);
        }
    }

    public function show(appointment $appointment)
    {
        // get appointment for specific doctor
        $appointments = appointment::where('id' , $appointment->id)
        ->select('fname' ,'lname' ,'gender' ,'marital_status' ,'phone_number' ,'address' ,'time' ,'birth' ,'date' ,'pricing' ,'remotely','email')
        ->orderBy('date' , 'ASC')
        ->orderBy('time' , 'ASC')
        ->get();
        return response()->json($appointments);
    }

    public function update(UpdateappointmentRequest $request, appointment $appointment)
    {
        if($request->has('fname'))
            $appointment->update(["fname" => $request->fname]);
        if($request->has('lname'))
            $appointment->update(["lname" => $request->lname]);
        if($request->has('gender'))
            $appointment->update(["gender" => $request->gender]);
        if($request->has('address'))
            $appointment->update(["address" => $request->address]);
        if($request->has('phone_number'))
            $appointment->update(["phone_number" => $request->phone_number]);
        if($request->has('birth')){
            $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');
            $appointment->update(["birth" => $birth]);
        }
        if($request->has('time'))
            $appointment->update(["time" => $request->time]);
        if($request->has('date')){
            $date = Carbon::createFromFormat('m/d/Y' , $request->date)->format('Y-m-d');
            $appointment->update(["date" => $date]);
        }
        if($request->has('pricing'))
            $appointment->update(["pricing" => $request->pricing]);
        if($request->has('marital_status'))
            $appointment->update(["marital_status" => $request->marital_status]);
        if($request->has('email'))
            $appointment->update(["email" => $request->email]);
        if($request->has('remotely'))
            $appointment->update(["remotely" => $request->remotely]);

            if($appointment){
                return response()->json([
                    'status' => true,
                    'msg' => 'Add appointment'
                ]);
            }else {
                return response()->json([
                    'status' => false,
                    'msg' => 'not Add appointment'
                ]);
            }
    }

    // public function destroy_list(doctor $doctor , Request $request)
    // {
    //     $date1 = Carbon::createFromFormat('Y-m-d', $request->date);
    //     $appointments = appointment::where('date' , $date1->format('Y-m-d'))
    //     ->where('doctor_id' , $doctor->id)
    //     ->get();
    //     // return $appointments;
    //     $message['body'] = "Hey, We Are HM Cente \n We apologiz for canceling your appointment due to
    //     emergency circumestances. \n Please contact the center.";
    //     try{
    //         foreach($appointments as $appointment){
    //              if($appointment->user_id != null){
    //                  $user = User::find($appointment->user_id);
    //                  $user->notify(new SendEmail($message));
    //              }
    //             $appointment->delete();
    //         }
    //         return response()->json(['message' => 'Appointments deleted successfully.']);
    //     }catch(\Throwable $e){
    //         return $e->getMessage();
    //         // return "please try again ";
    //         return response()->json(['message' => 'Error deleting appointments.']);
    //     }
    //      // return redirect()->route('/')->with($data);
    // }

    public function destroy_list(Doctor $doctor, Request $request)
{
    $date1 = Carbon::createFromFormat('Y-m-d', $request->date);
    $appointments = Appointment::where('date', $date1->format('Y-m-d'))
        ->where('doctor_id', $doctor->id)
        ->get();

    $message['body'] = "Hey, We Are HM Cente \n We apologize for canceling your appointment due to emergency circumstances. \n Please contact the center.";

    try {
        foreach ($appointments as $appointment) {
            if ($appointment->user_id != null) {
                $user = User::find($appointment->user_id);
                $user->notify(new SendEmail($message));
                $appointment->delete();
            } else {
                $appointment->update(['remotely' => 2]);
            }
        }

        return response()->json(['message' => 'Appointments deleted successfully.']);
    } catch (\Throwable $e) {
        return response()->json(['message' => 'Error deleting appointments.']);
    }
}




    public function destroy(appointment $appointment)
    {
        $message['body'] = "Hey, We Are HM Cente \n We apologiz for canceling your appointment due to emergency circumestances. \n Please contact the center.";

        try {

            if ($appointment->user_id != null) {
                $notificationSent = $appointment->user->notify(new SendEmail($message));
                $appointment->delete();
                if (!$notificationSent) {
                    return response()->json(['message' => 'Error sending notification.']);
                }
            }else{
                $appointment->delete();
            }

            return response()->json(['message' => 'Appointment deleted successfully.']);
        } catch(\Throwable $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Error deleting appointment.']);
        }
    }
}
