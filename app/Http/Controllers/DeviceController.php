<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Http\Requests\StoredeviceRequest;
use App\Http\Requests\UpdatedeviceRequest;

class DeviceController extends Controller
{
    public function index()
    {
        // $devices = device::simplePaginate(3);
        $devices = device::all();

        return view('dashboard.devices.devices' , compact('devices'));

    }
    public function index_record()
    {
        $devices = device::all();

        return response()->json($devices);
    }

    public function store(StoredeviceRequest $request)
    {
        $device_image = uploadImage('devices' , $request->image);
        $devices = device::create([
            'name' => $request->name,
            'image' => $device_image,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return $devices;
        // return redirect()->route('/')->with($data);
    }

    public function show(device $device)
    {
        return $device;
    }

    public function update(UpdatedeviceRequest $request, device $device)
    {
        if($request->has('name')){
            $device->update([ 'name' => $request->name]);
        }
        if($request->has('description')){
            $device->update([ 'description' => $request->description]);
        }
        if($request->has('price')){
            $device->update([ 'price' => $request->price]);
        }
        if($request->has('image')){
            $image = uploadImage('devices' , $request->image);
            $device->update([ 'image' => $image]);
        }

        return $device;
        // return viewe('dashboard.appointment.cardiologist-d2');
    }

    public function destroy(device $device)
    {
        $device->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Add secretary'
        ]);
        // return redirect()->route('/')->with($data);
    }
}
