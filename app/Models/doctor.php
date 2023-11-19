<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class doctor extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $appends = ['fullname', 'age'];


    protected $fillable = [
        'fname' ,
        'lname' ,
        'email' ,
        'password' ,
        'phone_number' ,
        'birth' ,
        'gender' ,
        'photo' ,
        'bio' ,
        'specialization_id' ,
        'avarage_price' ,
        'avarage_treatment' ,
        'remotely' ,
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];

    public function specialization(){
        return $this->belongsTo(category::class );
    }

    public function doctor_days(){
        return $this->hasMany(doctor_day::class , 'doctor_id');
    }

    public function days(){
        return $this->belongsToMany(day::class , 'doctor_days' ,'doctor_id' , 'day_id');
    }

    public static function selection($query){
        return $query->where('id' , $query->id)
        ->select('id', doctor::raw("CONCAT(fname, ' ' ,lname) AS name") ,'phone_number'  ,'photo' , 'bio' ,'avarage_price' ,'remotely')
        ->first();
    }

    public function getAgeAttribute()
    {
        $birthDate = Carbon::parse($this->birth);
        $currentDate = Carbon::now();

        return $birthDate->diffInYears($currentDate);
    }

    public function getFullnameAttribute()
    {
        return $this->fname .' ' . $this->lname;
    }
}
