<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class record extends Model
{
    use HasFactory;
    protected $table = 'records';
    protected $primaryKey = 'id';

    protected $fillable = [
        'doctor_id' ,
        'appointment_id' ,
        'blood_pressure_rate' ,
        'heart_rate' ,
        'respiratory_rate' ,
        'saturation_rate' ,
        'story' ,
        'blood_pressure' ,
        'asthma' ,
        'diabetes' ,
        'heart_disease' ,
        'renal_disease' ,
        'tumors' ,
        'medicinal_history' ,
        'surgical_history',
        'headache',
        'chest_pain',
        'cough',
        'dizziness',
        'dyspnea',
        'abdominal_pain',
        'constipation',
        'vomiting',
        'arthralgia',
        'diarhea',
        'diagnosis',
        'medicinal_analysis',
        'created_at',
        'updated_at',
    ];

    protected $hidden =[
      
    ];

    public function appointment(){
        return $this->belongsTo(appointment::class );
    }
    public function doctor(){
        return $this->belongsTo(doctor::class );
    }
}
