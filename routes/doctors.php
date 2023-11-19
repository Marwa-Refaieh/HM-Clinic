<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//prefix
//doctor

Route::middleware(['auth:doctor'])->group(function(){
    // Route::get('dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('doctors.dashboard');

    Route::get('show/profile/{doctor}', [App\Http\Controllers\DoctorController::class , 'show_profile']);
    Route::get('names/{category}', [App\Http\Controllers\DoctorController::class , 'doctor_name'])->name('doctors.names');

    // //appointment
    // Route::prefix('appointment')->group(function(){
    //     Route::get('index/patient/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient']);
    //     Route::get('index/clinic/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_clinic']);
    //     Route::get('index/remotly/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_remotly']);
    //     //Route::get('show/{doctor}', [App\Http\Controllers\AppointmentController::class , 'show']);
    // });

    // //record
    // Route::prefix('record')->group(function(){
    //     Route::get('index/{appointment}', [App\Http\Controllers\RecordController::class , 'index']);
    //     Route::get('last/{appointment}', [App\Http\Controllers\RecordController::class , 'get_last']);
    //     Route::post('add/{appointment}', [App\Http\Controllers\RecordController::class , 'store']);
    //     Route::post('update/{record}', [App\Http\Controllers\RecordController::class , 'update']);
    //     Route::delete('destroy/{record}', [App\Http\Controllers\RecordController::class , 'destroy']);
    // });

    // //device
    // Route::prefix('device')->group(function(){
    //     Route::get('index', [App\Http\Controllers\DeviceController::class , 'index']);
    // });

    // //device order
    // Route::prefix('device_order')->group(function(){
    //     Route::post('add', [App\Http\Controllers\DeviceOrderController::class , 'store']);
    //     Route::post('update/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'update']);
    //     Route::delete('destroy/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'destroy']);
    // });

      ///////////////////////////////// route doctors /////////////////////////////////


     //appointment
     Route::prefix('appointment')->group(function(){
        Route::get('index/patient/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient']);
        Route::get('index/all/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_all']);
        Route::get('index/remotly/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_remotly']);
        Route::get('index/all_psycholo/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_psycholo']);
        Route::get('index/psycholo/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient_psycholo']);

        //Route::get('show/{doctor}', [App\Http\Controllers\AppointmentController::class , 'show']);
    });

    //record
    Route::prefix('record')->group(function(){
        Route::get('index/{appointment}', [App\Http\Controllers\RecordController::class , 'index']);
        Route::get('last/{appointment}', [App\Http\Controllers\RecordController::class , 'get_last']);
        Route::post('add/{appointment}', [App\Http\Controllers\RecordController::class , 'store']);
        // Route::get('show/{record}',[App\Http\Controllers\RecordController::class , 'get_last']);
        Route::post('update/{record}', [App\Http\Controllers\RecordController::class , 'update']);
        Route::delete('destroy/{record}', [App\Http\Controllers\RecordController::class , 'destroy']);
    });

    //device
    Route::prefix('device')->group(function(){
        Route::get('index/record', [App\Http\Controllers\DeviceController::class , 'index_record'])->name('device.record');
    });

    //device order
    Route::prefix('device_order')->group(function(){
        Route::post('add', [App\Http\Controllers\DeviceOrderController::class , 'store']);
        Route::post('update/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'update']);
        Route::delete('destroy/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'destroy']);
    });
});
