<?php


namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\category;
use App\Models\doctor;
use App\Models\doctor_day;
use App\Models\specialization;
use App\Http\Requests\StoredoctorRequest;
use App\Http\Requests\UpdatedoctorRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{

    //all doctor in dashboard
    public function index_all(){
        $doctors = doctor::select('id' ,'photo', 'fname' , 'lname' , 'gender' , 'birth' , 'phone_number' , 'avarage_price' , 'email' , 'password' ,'specialization_id')
        ->with('specialization' , 'doctor_days')
        ->get();
        return view('dashboard.employees.doctors' , compact('doctors'));
        // return $doctors;

    }

    //all doctor in demo
    public function index()
    {
        // $doctors = doctor::select('doctors.id' , 'doctors.photo' , doctor::raw("CONCAT(doctors.fname, ' ' ,doctors.lname) AS name") ,'categories.name AS spec_name' )
        // ->join('categories' , 'categories.id' , '=' , 'doctors.specialization_id')
        // ->get();
        $doctors = doctor::with(['specialization', 'days'])->get();

        return $doctors;

//        return view('demo.doctors' , compact('doctors'));
    }

    public function index_view()
    {
        $doctors = doctor::select('doctors.id' , 'doctors.photo' , doctor::raw("CONCAT(doctors.fname, ' ' ,doctors.lname) AS name") ,'specialization_id')
            ->with('specialization')
            ->get();
      //  $doctors = doctor::with(['specialization', 'days'])->get();

//        dd($doctors);

        return view('demo.doctors' , compact('doctors'));
    }

    public function doctor_name_all(category $category){
        $doctors = doctor::where('specialization_id' , $category->id)
        ->select('doctors.id' , doctor::raw("CONCAT(doctors.fname, ' ' ,doctors.lname) AS name"))
        ->get();
        return response()->json($doctors);
    }
    public function doctor_name(category $category)
{
    $loggedInDoctor = Auth::guard('doctor')->user(); // استخدام حارس "doctor" للحصول على معلومات الطبيب المسجل

    $doctors = doctor::where('specialization_id', $category->id)
        ->where('id', $loggedInDoctor->id) // تحديد الطبيب المسجل الذي يحمل نفس الـ ID
        ->select('doctors.id', doctor::raw("CONCAT(doctors.fname, ' ', doctors.lname) AS name"))
        ->get();

    return response()->json($doctors);
}

    public function store(StoredoctorRequest $request)
    {
        $photo_path = uploadImage('doctors' , $request->photo);

        // if($request->has('remotely'))
        //     $remotely = 1;
        // else
        //     $remotely = 0;

        $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');

        $doctor = doctor::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'birth' => $birth,
            'photo' => $photo_path,
            'bio' => $request->bio,
            'gender' => $request->gender,
            'specialization_id' => $request->specialization_id,
            'avarage_price' => $request->avarage_price,
            'avarage_treatment' => $request->avarage_treatment,
            'remotely' => $request->remotely,
        ]);

        foreach($request->days as $day){
            doctor_day::create([
                'doctor_id' => $doctor->id,
                'day_id' => $day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        }


        $lastDoctor = doctor::select('id', 'photo', 'fname', 'lname', 'gender', 'birth', 'phone_number', 'avarage_price', 'email', 'password', 'specialization_id')
          ->with('specialization', 'doctor_days')
          ->latest('created_at')
          ->first();
        if($lastDoctor){
            // return "done";
            return response()->json([
                'status' => true,
                'msg' => 'Add appointment',
                'data' => [
                    'doctor' => $lastDoctor,
                ],
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add appointment'
            ]);
        }
        // redirect()->route('/')->with(['success' => "success"]);
    }

    public function show_profile(doctor $doctor)
    {
        $data['doctor'] = doctor::selection($doctor);
        $data['age'] =  $doctor->age();
        $data['specialization'] = $doctor->specialization()->first()->name;
        $current =[];
        $days = $doctor->doctor_days()->get();
        foreach($days as $day){
            array_push($current, $day->day()->first());
        }
        $data['days'] = $current;

        return $data;
        // return view('demo.doctors' , ['data' => $data]);
        // return view('demo.doctor-details' , compact('data'));
    }
    //show doctor in demo
    public function show(doctor $doctor)
    {
//        $data['doctor'] = doctor::selection($doctor);
//        $data['age'] =  $doctor->age();
//        $data['specialization'] = $doctor->specialization()->first()->name;
      //  $current =[];
       // $days = $doctor->doctor_days()->get();

         $doctor->load(['doctor_days.day', 'specialization']);
//        return $doctor;
//        foreach($days as $day){
//            array_push($current, $day->day()->first());
//        }
//        $data['days'] = $current;

        return response()->json($doctor);
        // return $data;
        // return view('demo.doctors' , ['data' => $data]);
        // return view('demo.doctor-details' , compact('data'));
    }

    //doctor in dashboard
    public function show_dashboard(doctor $doctor){
        $doctor = doctor::where('id',$doctor->id)
        ->select('id' , 'fname' , 'lname' , 'gender' , 'birth' , 'phone_number' , 'avarage_price' , 'email'  ,'specialization_id','remotely','bio', 'avarage_treatment')
        ->with('specialization' , 'days')
        ->get();
        return response()->json($doctor);
    }

    public function get_price(doctor $doctor){
        return view('demo.appointment' , compact('doctor->avarage_price'));
    }
    public function get_price_dashboard(doctor $doctor){

        return response()->json($doctor->avarage_price);
    }

    public function update(UpdatedoctorRequest $request, doctor $doctor)
    {
    //    dd($request->all());
        if($request->has('fname'))
            $doctor->update([ 'fname' => $request->fname]);
        if($request->has('lname'))
            $doctor->update([ 'lname' => $request->lname]);
        if($request->has('email'))
            $doctor->update([ 'email' => $request->email]);
            if ($request->has('password')) {
                $hashedPassword = bcrypt($request->password);
                $doctor->update(['password' => $hashedPassword]);
            }
        if($request->has('phone_number'))
            $doctor->update([ 'phone_number' => $request->phone_number]);
        if($request->has('birth')){
            $birth = Carbon::createFromFormat('m/d/Y' , $request->birth)->format('Y-m-d');
            $doctor->update([ 'birth' => $birth]);
        }
        if($request->has('bio'))
            $doctor->update([ 'bio' => $request->bio]);
        if($request->has('gender'))
            $doctor->update([ 'gender' => $request->gender]);
        if($request->has('specialization_id'))
            $doctor->update([ 'specialization_id' => $request->specialization_id]);
        if($request->has('avarage_price'))
            $doctor->update([ 'avarage_price' => $request->avarage_price]);
        if($request->has('avarage_treatment'))
            $doctor->update([ 'avarage_treatment' => $request->avarage_treatment]);
        if($request->has('remotely'))
            $doctor->update([ 'remotely' => $request->remotely]);
        if($request->has('photo')){
            $photo_path = uploadImage('doctors' , $request->photo);
            $doctor->update([ 'photo' => $photo_path]);
        }
        if($request->has('days')){
//            $old_day = $doctor->doctor_days()->get();
//            $old_day_count = $old_day->count();
//            $start = ($request->has('start_time') ? $request->start_time : $old_day->first()->start_time);
//            $end = ($request->has('end_time') ? $request->end_time : $old_day->first()->end_time);
//            foreach($request->days as $day){
//                $sum = 0;
//                foreach($old_day as $old){
//                        if($day == $old->day_id){
//                            $old->delete();
//                            break;
//                        }
//                        else{
//                            $sum++;
//                        }
//                }
//                if($sum == $old_day_count){
//                    doctor_day::create([
//                        'doctor_id' => $doctor->id,
//                        'day_id' => $day,
//                        'start_time' => $start,
//                        'end_time' => $end,
//                    ]);
//                }
//            }
//            if($old_day->count() != 0){
//                foreach($old_day as $old){
//                        $old->delete();
//                }
//            }
            $doctor->doctor_days()->delete();
            foreach($request->days as $day){
                doctor_day::create([
                    'doctor_id' => $doctor->id,
                    'day_id' => $day,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                ]);
            }

        }

        // return $doctor;
        return response()->json($doctor);

        // return redirect()->route('/')->with(['success' => "success"]);
    }

    public function destroy(doctor $doctor)
    {
        $doctor->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Add secretary'
        ]);
        // return view('demo.doctors');
        // return redirect()->route('/')->with(['data' => 'success']);
    }
}
