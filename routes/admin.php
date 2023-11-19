<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes

|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//prefix
//admin

//dashboard login

Route::get('login', [App\Http\Controllers\AdminAuth\LoginController::class, 'showLogin'])->name('admin.login');
Route::post('logout/admin', [App\Http\Controllers\AdminAuth\LoginController::class, 'logout'])->name('admin.logout');
Route::post('store', [App\Http\Controllers\AdminAuth\LoginController::class, 'login'])->name('admin.login.submit');
Route::get('dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth:admin,doctor,paramedic,secretary']);


Route::middleware(['auth:admin'])->group(function(){

    //article
    Route::prefix('artical')->group(function (){
        Route::get('index/{category}', [App\Http\Controllers\ArticleController::class , 'index_all'])->name('articles.index');
        Route::post('store', [App\Http\Controllers\ArticleController::class , 'store'])->name('articles.store');
        Route::get('show/{article}', [App\Http\Controllers\ArticleController::class , 'show']); // في حال ظهور مشكلة في route  جرب علقه
        Route::post('update/{article}', [App\Http\Controllers\ArticleController::class , 'update']);
        Route::delete('destroy/{article}', [App\Http\Controllers\ArticleController::class , 'destroy']);
    });

    //doctor
    Route::prefix('doctor')->group(function(){
        Route::get('index/all_psycholo/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_psycholo']);
        Route::get('index/all/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_all']);
        Route::get('index/all', [App\Http\Controllers\DoctorController::class , 'index_all'])->name('doctors.index');
        Route::get('index/all_ajax', [App\Http\Controllers\DoctorController::class , 'index'])->name('doctors.ajax_index');
        Route::get('doctor_name/{category}', [App\Http\Controllers\DoctorController::class , 'doctor_name_all'])->name('doctors.names');
        Route::post('add', [App\Http\Controllers\DoctorController::class , 'store'])->name('doctors.store');
	    Route::get('show/doctor/{doctor}',[App\Http\Controllers\DoctorController::class , 'show_dashboard']);
        Route::post('update/{doctor}', [App\Http\Controllers\DoctorController::class , 'update']);
        Route::delete('destroy/{doctor}', [App\Http\Controllers\DoctorController::class , 'destroy']);
    });

    //device
    Route::prefix('device')->group(function(){
        Route::get('index', [App\Http\Controllers\DeviceController::class , 'index'])->name('devices');
        Route::post('add', [App\Http\Controllers\DeviceController::class , 'store'])->name('devices.store');
        Route::get('show/{device}', [App\Http\Controllers\DeviceController::class , 'show']);
        Route::post('update/{device}', [App\Http\Controllers\DeviceController::class , 'update']);
        Route::delete('destroy/{device}', [App\Http\Controllers\DeviceController::class , 'destroy']);
        Route::get('index/record', [App\Http\Controllers\DeviceController::class , 'index_record'])->name('device_secretary.record');

    });

    //secretary
    Route::prefix('secretary')->group(function(){
        // Route::get('secretarys', [App\Http\Controllers\SecretaryController::class , 'index_page'])->name('secretarys.page');
        Route::get('index', [App\Http\Controllers\SecretaryController::class , 'index'])->name('secretary.index');
        Route::get('index/all', [App\Http\Controllers\SecretaryController::class , 'index_all'])->name('secretary.index_ajax');
        Route::post('add', [App\Http\Controllers\SecretaryController::class , 'store'])->name('secretary.store');
        Route::get('show/{secretary}', [App\Http\Controllers\SecretaryController::class , 'show'])->name('secretary.show');
        Route::post('update/{secretary}', [App\Http\Controllers\SecretaryController::class , 'update'])->name('secretary.update');
        Route::delete('destroy/{secretary}', [App\Http\Controllers\SecretaryController::class , 'destroy']);
    });

    //paramedic
    Route::prefix('paramedic')->group(function(){
        Route::get('index', [App\Http\Controllers\ParamedicController::class , 'index'])->name('paramedic.index');
        Route::get('index/all', [App\Http\Controllers\ParamedicController::class , 'index_all'])->name('paramedic.index_ajax');
        Route::post('add', [App\Http\Controllers\ParamedicController::class , 'store'])->name('paramedic.store');
        Route::get('show/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'show'])->name('paramedic.show');
        Route::post('update/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'update']);
        Route::delete('destroy/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'destroy']);
    });

     ///////////////////////////////// route secretary /////////////////////////////////

    // //appointment
    Route::prefix('appointment')->group(function(){
        Route::get('index/patient/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient']);
        Route::get('index/psycholo/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient_psycholo']);
        Route::get('index/clinic/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_clinic'])->name('index_clinic');
        Route::get('index/remotly/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_remotly']);
    });

    //  ///////////////////////////////// route doctors /////////////////////////////////

    // //record
    Route::prefix('record')->group(function(){
        Route::get('index/{appointment}', [App\Http\Controllers\RecordController::class , 'index']);
        Route::get('last/{appointment}', [App\Http\Controllers\RecordController::class , 'get_last']);
    });

    // //device
    Route::prefix('device')->group(function(){
        Route::get('index/record', [App\Http\Controllers\DeviceController::class , 'index_record'])->name('device.record');
    });
    
});
