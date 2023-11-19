<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device_order extends Model
{
    use HasFactory;

    protected $table = 'device_orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'record_id',
        'device_id',
        'secretary_id',
        'fname',
        'lname',
        'phone_number',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $hidden =[

    ];

    public function record(){
        return $this->belongsTo(record::class);
    }
    public function device(){
        return $this->belongsTo(device::class , 'device_id');
    }
    public function secretary(){
        return $this->belongsTo(secretary::class , 'secretary_id');
    }

    // public static function selection_all($orders){
    //     $data = [];

    //     foreach($orders as $order){
    //         $doctor =(is_null($order->record_id) ? null
    //         : $order->record()->first()->doctor()->select('id' , 'fname' , 'lname')->first());

    //         $secretary = ($order->status == 0 ? null
    //         : $order->secretary()->select('id' , 'fname' , 'lname')->first());

    //         array_push($data , [
    //             'patient' => $order->where('id' , $order->id)->select('id' , 'fname' , 'lname' , 'phone_number')->first(),
    //             'device' => $order->device()->select('id' , 'name' , 'price')->first(),
    //             'doctor' => $doctor,
    //             'secertary' => $secretary,
    //         ]);
    //     }
    //     return $data;
    // }
    public static function selection_all($orders){
        $data = [];

        foreach($orders as $order){
            $doctor =(is_null($order->record_id) ? null
            : $order->record()->first()->doctor()->select('id' , 'fname' , 'lname')->first());

            $secretary = ($order->status == 0 ? null
            : $order->secretary()->select('id' , 'fname' , 'lname')->first());

            array_push($data , [
                'patient' => $order->where('id' , $order->id)->select('id' , 'fname' , 'lname' , 'phone_number')->first(),
                'device' => $order->device()->select('id' , 'name' , 'price')->first(),
                'doctor' => $doctor,
                'secertary' => $secretary,
                'created_at' => $order->created_at, // إضافة created_at إلى المصفوفة
            ]);
        }
        return $data;
    }
}
