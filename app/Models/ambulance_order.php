<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ambulance_order extends Model
{
    use HasFactory;
    protected $table = 'ambulance_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'paramedics_id',
        'phone_number',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $hidden =[];
    public function paramedic(){
        return $this->belongsTo(paramedic::class , 'paramedics_id');
    }
}
