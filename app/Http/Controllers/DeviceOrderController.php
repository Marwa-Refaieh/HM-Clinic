<?php

namespace App\Http\Controllers;

use App\Models\device_order;
use App\Models\device;
use App\Http\Requests\Storedevice_orderRequest;
use App\Http\Requests\Updatedevice_orderRequest;
use App\Models\record;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DeviceOrderController extends Controller
{
    public function index()
    {
        $orders = device_order::where('status' , 0)->get();
        $datas = device_order::selection_all($orders);

        $orders = device_order::where('status' , 1)->get();
        $acceptances = device_order::selection_all($orders, ['created_at']);

        $today = Carbon::today(); // الحصول على تاريخ اليوم

        $orders = device_order::where('status', 0)
            ->whereDate('created_at', $today)
            ->get();

        $datasToday = device_order::selection_all($orders);

        // return $datasToday;
        return view('dashboard.devices.device-request' , compact('datas','acceptances','datasToday'));

    }

    public function getSecretaryId()
    {
        return response()->json(['secretary_id' => auth()->user()->id]);
    }

    public function store(Storedevice_orderRequest $request)
    {

        if($request->has('record_id')){
            $patiant = record::where('id' , $request->record_id)->first();
            $fname = $patiant->appointment()->select('fname')->first()->fname;
            $lname = $patiant->appointment()->select('lname')->first()->lname;
            $phone_number = $patiant->appointment()->select('phone_number')->first()->phone_number;
        }
        $device = device::findOrFail($request->device_id);
        $device_name = $device->name;
        $device_price = $device->price;

       $device_order = device_order::create([
            'record_id' => ($request->has('record_id') ? $request->record_id : null),
            'device_id' => $request->device_id,
            'secretary_id' => ($request->has('record_id') ? null : auth()->id()),
            'fname' => ($request->has('record_id') ? $fname : $request->fname),
            'lname' => ($request->has('record_id') ? $lname : $request->lname),
            'phone_number' => ($request->has('record_id') ? $phone_number : $request->phone_number),
            'status' => ($request->has('status') ? $request->status : 0),
        ]);
        $created_at = $device_order->created_at->format('Y-m-d H:i:s');
        if($device_order){
            // return "done";
            return response()->json([
                'status' => true,
                'msg' => 'Add appointment',
                'data' => [
                    'device_order' => $device_order,
                    'device_name' => $device_name,
                    'device_price' => $device_price,
                    'created_at' => $created_at,
                ],
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add appointment'
            ]);
        }
    }

    public function updateDeviceOrder(Storedevice_orderRequest $request, $id)
    {
        $device_order = device_order::find($id);

        if($device_order){
            if($request->has('record_id')){
                $patiant = record::where('id' , $request->record_id)->first();
                $fname = $patiant->appointment()->select('fname')->first()->fname;
                $lname = $patiant->appointment()->select('lname')->first()->lname;
                $phone_number = $patiant->appointment()->select('phone_number')->first()->phone_number;
            }

            $updateData = [
                'record_id' => ($request->has('record_id') ? $request->record_id : null),
                'device_id' => $request->device_id,
                'secretary_id' => ($request->has('record_id') ? null : auth()->id()),
                'fname' => ($request->has('record_id') ? $fname : $request->fname),
                'lname' => ($request->has('record_id') ? $lname : $request->lname),
                'phone_number' => ($request->has('record_id') ? $phone_number : $request->phone_number),
                'status' => ($request->has('status') ? $request->status : 0),
            ];

            $device_order->update($updateData);
            $device = device::findOrFail($request->device_id);
            $device_name = $device->name;
            $device_price = $device->price;
            $created_at = $device_order->created_at->format('Y-m-d H:i:s');
            return response()->json([
                'status' => true,
                'msg' => 'Add appointment',
                'data' => [
                    'device_order' => $device_order,
                    'device_name' => $device_name,
                    'device_price' => $device_price,
                    'created_at' => $created_at,
                ],
            ]);

        }
    }

    public function show(device_order $device_order)
    {
        $device = $device_order->device;
        return response()->json([
            'status' => true,
            'data' => [
                'device_id' => $device_order->device_id,
                'device_name' => $device->name,
                'device_price' => $device->price,
                'fname' => $device_order->fname,
                'lname' => $device_order->lname,
                'phone_number' => $device_order->phone_number,
            ],
        ]);
    }

    public function update(Updatedevice_orderRequest $request, device_order $device_order)
    {
        $device = device::findOrFail($device_order->device_id);
        $device_name = $device->name;
        $device_price = $device->price;
        $created_at = $device_order->created_at->format('Y-m-d H:i:s');
        // $secretaryName = $device_order->secretary->name();
        if(auth()->guard('secretary')){
            $device_order->update([
                'secretary_id' => auth()->id() ,
                'status' =>  $request->status,
            ]);


            if($device_order){
            // return "done";
            return response()->json([
                'status' => true,
                'data' => [
                    'device_order' => $device_order,
                    'device_name' => $device_name,
                    'device_price' => $device_price,
                    // 'secretaryName' => $secretaryName,
                    'created_at' => $created_at,
                ],
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add appointment'
            ]);
        }
        }
        if(auth()->guard('doctor')){
            $device_order->update([
                'device_id' => $request->device_id
            ]);
        }

    }

    public function destroy(device_order $device_order)
    {
        $device_order->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Add secretary'
        ]);
    }
}
