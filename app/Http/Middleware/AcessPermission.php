<?php

namespace App\Http\Middleware;

use App\Models\record;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $guardName = Auth::getDefaultDriver();
        $user = Auth::user();
        $parameter =$request->route()->parameters();

        if(array_key_exists('user',$parameter )) {
            $parameter = $parameter['user']->id;
        }
        else if(array_key_exists('secretary',$parameter )){
            $parameter = $parameter['secretary']->id;
        }
        else if(array_key_exists('paramedic',$parameter )){
            $parameter = $parameter['paramedic']->id;
        }
        else if(array_key_exists('ambulance_order',$parameter )){
            $parameter = $parameter['ambulance_order']->paramedic_id;
        }
        else if(array_key_exists('doctor',$parameter )){
            $parameter = $parameter['doctor']->id;
        }
        else if(array_key_exists('appointment',$parameter )){
            $parameter = $parameter['appointment']->doctor_id;
        }
        else if(array_key_exists('record',$parameter )){
            $parameter = $parameter['record']->doctor_id;
        }
        else if(array_key_exists('device_order',$parameter )){
            $parameter = $parameter['device_order']->doctor_id;
        }
        else if($request->has('record_id')){
            $record = record::find('record_id');
            $parameter = $record->doctor_id;
        }
        else{
            $parameter = null;
        }

        if($guardName == 'users'){
            if($parameter == $user->id ){
                return $next($request);
            }
            else{
                return route('admin.dashboard');
            }
        }
        else if ($guardName == 'secretaries'){
            if($parameter == $user->id ){
                return $next($request);
            }
            else{
                return route('admin.dashboard');
            }
        }
        elseif ($guardName == 'paramedics'){
            if($parameter == $user->id ){
                return $next($request);
            }
            else{
                return route('admin.dashboard');
            }
        }
        elseif ($guardName == 'doctors'){
            if($parameter == $user->id ){
                return $next($request);
            }
            else{
                return route('admin.dashboard');
            }
        }
        else{
            return route('admin.dashboard');
        }

    }
}
