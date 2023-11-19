<?php

namespace App\Http\Controllers;

use App\Models\ambulance_order;
use App\Http\Requests\Storeambulance_orderRequest;
use App\Http\Requests\Updateambulance_orderRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AmbulanceOrderController extends Controller
{


public function index()
{
    $today = Carbon::today();

    $orders = ambulance_order::where('status', 0)
        ->whereDate('created_at', $today)
        ->get();

    $accepted = ambulance_order::where('status', 1)
        ->with('paramedic')
        ->whereDate('updated_at', $today)
        ->get();

    $executed = ambulance_order::where('status', 2)
        ->with('paramedic')
        ->whereDate('updated_at', $today)
        ->get();

        $executedAll = ambulance_order::where('status', 2)
        ->with('paramedic')
        ->get();

    return view('dashboard.Ambulance-requests', compact('orders', 'accepted', 'executed','executedAll'));
}
    public function index_accepted()
    {
        $orders = ambulance_order::where('status' , 1)
        ->with('paramedic')
        ->get();

        return $orders;

    }
    public function index_executed()
    {
        $orders = ambulance_order::where('status' , 2)
        ->with('paramedic')
        ->get();

        return $orders;
    }
    public function store(Storeambulance_orderRequest $request)
    {
        ambulance_order::create([
            'phone_number'=> $request->phone_number,
        ]);

        return "done";

    }

    public function update(Request $request, ambulance_order $ambulance_order)
    {
        $ambulance_order->update([
            'paramedics_id'=> auth()->id(),
            'status' => 1,
        ]);

        $order = ambulance_order::where('status', 1)
        ->with('paramedic')
        ->latest()
        ->take(1)
        ->get();
        // return $ambulance_order;
        if($order){
            // return "done";
            return response()->json([
                'status' => true,
                'data' => [
                    'order' => $order,
                ],
            ]);
        }else {
            return response()->json([
                'status' => false,
                'msg' => 'not Add appointment'
            ]);
        }
    }

    public function execute(ambulance_order $ambulance_order)
    {
        $ambulance_order->update([
            'status' => 2,
        ]);
        $created_at = $ambulance_order->created_at->format('Y-m-d H:i:s');
        $order = ambulance_order::where('status', 2)
        ->with('paramedic')
        ->latest()
        ->take(1)
        ->get();

        if($order){
            // return "done";
            return response()->json([
                'status' => true,
                'data' => [
                    'order' => $order,
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
    public function destroy(ambulance_order $ambulance_order)
    {
        $ambulance_order->delete();
        return "done";
    }
}
