<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_day extends Model
{
    use HasFactory;
    protected $table = 'doctor_days';
    protected $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'day_id',
        'start_time',
        'end_time',
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];

    public function day(){
        return $this->belongsTo(day::class , 'day_id');
    }

    public function doctor(){
        return $this->belongsTo(doctor::class , 'doctor_id');
    }
}
