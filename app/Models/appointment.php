<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{ use HasFactory;
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fname' ,
        'lname' ,
        'gender' ,
        'marital_status' ,
        'phone_number' ,
        'address' ,
        'time' ,
        'birth' ,
        'date' ,
        'pricing' ,
        'doctor_id' ,
        'user_id' ,
        'remotely' ,
        'email' ,
    ];
    protected $hidden =[
        'created_at',
        'updated_at',];
    public function user(){
        return $this->belongsTo(User::class );
    }
}
