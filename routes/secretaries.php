<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| secretaries Routes
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
//secratery
Route::get('index', [App\Http\Controllers\DeviceOrderController::class , 'index'])->name('deviceOrder')->middleware(['auth:admin,secretary']);

Route::middleware(['auth:secretary'])->group(function(){
    // Route::get('dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('secretary.dashboard');

    //secretary
    Route::get('show/{secretary}', [App\Http\Controllers\SecretaryController::class , 'show']);
    Route::post('update/{secretary}', [App\Http\Controllers\SecretaryController::class , 'update']);
    Route::get('get-secretary-id', [App\Http\Controllers\DeviceOrderController::class , 'getSecretaryId'])->name('secretary_id');

    Route::get('doctor_name/{category}', [App\Http\Controllers\DoctorController::class , 'doctor_name_all']);

     //appointment /secretary
     Route::prefix('appointment')->group(function(){
        // Route::get('names/{category}', [App\Http\Controllers\DoctorController::class , 'doctor_name'])->name('doctors_names.appointment');
        Route::get('index/patient/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient']);
        Route::get('index/all/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_all'])->name('index_all');
        // Route::get('index/ajax/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_ajax']);
        Route::get('index/remotly/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_remotly_today']);
        Route::get('index/clinic/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_clinic_today']);
        Route::get('index/clinic/all/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_clinic_all']);
        Route::get('index/remotly/all/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_remotly_all']);
        // Route::get('index/show_list/{doctor}', [App\Http\Controllers\AppointmentController::class , 'show_list']);
        Route::get('index/all_psycholo/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_psycholo']);
        Route::get('index/psycholo/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient_psycholo']);
        Route::post('add', [App\Http\Controllers\AppointmentController::class , 'store'])->name('appointment.store');
        Route::get('show/dashboard/{appointment}',[App\Http\Controllers\AppointmentController::class , 'show']);
        Route::post('update/{appointment}', [App\Http\Controllers\AppointmentController::class , 'update']);
        Route::post('destroy_list/{doctor}', [App\Http\Controllers\AppointmentController::class , 'destroy_list']);
        Route::get('destroy_list/show/{doctor}', [App\Http\Controllers\AppointmentController::class , 'destroy_list_show']);
        Route::delete('destroy/{appointment}', [App\Http\Controllers\AppointmentController::class , 'destroy']);
    });
   //device
   Route::prefix('device')->group(function(){
    Route::get('index/record', [App\Http\Controllers\DeviceController::class , 'index_record'])->name('device_secretary.record');
    });


    //device order
    Route::prefix('device_order')->group(function(){
        Route::get('index/show', [App\Http\Controllers\DeviceOrderController::class , 'index_show'])->name('show');
        Route::get('index/accepted', [App\Http\Controllers\DeviceOrderController::class , 'index_accepted']);
        Route::post('add', [App\Http\Controllers\DeviceOrderController::class , 'store'])->name('device_order.store');
        Route::post('update/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'update']);
        Route::post('edit/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'updateDeviceOrder']);
        Route::get('show/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'show']);
        Route::delete('destroy/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'destroy']);
    });

});
