<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ArticleController;
use App\HTTP\Controllers\DoctorController;
use App\HTTP\Controllers\DoctorDayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [App\Http\Controllers\AdminController::class , 'login']);

//info in demo
Route::get('get_info' , [App\Http\Controllers\HomeController::class , 'get_info']);
//category
Route::get('category/index', [App\Http\Controllers\CategoryController::class , 'index']);
//article
Route::prefix('artical')->group(function(){
    Route::get('index/{category}', [ArticleController::class , 'index']);
    Route::post('store', [ArticleController::class , 'store']);
    Route::get('show/{article}', [ArticleController::class , 'show']);
    Route::post('update/{article}', [ArticleController::class , 'update']);
    Route::delete('destroy/{article}', [ArticleController::class , 'destroy']);
});
//doctor
Route::prefix('doctor')->group(function(){
    Route::get('index/all', [DoctorController::class , 'index_all']);
    Route::get('index', [DoctorController::class , 'index']);
    Route::get('names/{category}', [DoctorController::class , 'doctor_name']);
    Route::post('add', [DoctorController::class , 'store']);
    Route::get('show/{doctor}', [DoctorController::class , 'show']);
    Route::get('price/{doctor}', [DoctorController::class , 'get_price']);
    Route::post('update/{doctor}', [DoctorController::class , 'update']);
    Route::delete('destroy/{doctor}', [DoctorController::class , 'destroy']);
});
            //day
            Route::get('day/index', [App\Http\Controllers\DayController::class , 'index']);
            //doctor day
            Route::prefix('doctor_day')->group(function(){
                Route::post('store', [DoctorDayController::class , 'store']);
                Route::delete('destroy/{doctor_day}', [DoctorDayController::class , 'destroy']);
            });

//device
Route::prefix('device')->group(function(){
    Route::get('index', [App\Http\Controllers\DeviceController::class , 'index']);
    Route::post('add', [App\Http\Controllers\DeviceController::class , 'store']);
    Route::post('update/{device}', [App\Http\Controllers\DeviceController::class , 'update']);
    Route::delete('destroy/{device}', [App\Http\Controllers\DeviceController::class , 'destroy']);
});

//secretary
Route::prefix('secretary')->group(function(){
    Route::get('index', [App\Http\Controllers\SecretaryController::class , 'index']);
    Route::post('add', [App\Http\Controllers\SecretaryController::class , 'store']);
    Route::get('show/{secretary}', [App\Http\Controllers\SecretaryController::class , 'show']);
    Route::post('update/{secretary}', [App\Http\Controllers\SecretaryController::class , 'update']);
    Route::delete('destroy/{secretary}', [App\Http\Controllers\SecretaryController::class , 'destroy']);
});

//paramedic
Route::prefix('paramedic')->group(function(){
    Route::get('index', [App\Http\Controllers\ParamedicController::class , 'index']);
    Route::post('add', [App\Http\Controllers\ParamedicController::class , 'store']);
    Route::get('show/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'show']);
    Route::post('update/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'update']);
    Route::delete('destroy/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'destroy']);
});

//user
Route::prefix('user')->group(function(){
    Route::post('login', [App\Http\Controllers\UserController::class , 'login']);
    Route::post('store', [App\Http\Controllers\UserController::class , 'store']);
    Route::delete('destroy/{user}', [App\Http\Controllers\UserController::class , 'destroy']);
});

//ambulance order
Route::prefix('ambulance_order')->group(function(){
    Route::get('index', [App\Http\Controllers\AmbulanceOrderController::class , 'index']);
    Route::post('add', [App\Http\Controllers\AmbulanceOrderController::class , 'store']);
    Route::get('show/accepted', [App\Http\Controllers\AmbulanceOrderController::class , 'index_accepted']);
    Route::get('show/executed', [App\Http\Controllers\AmbulanceOrderController::class , 'index_executed']);
    Route::post('update/{ambulance_order}', [App\Http\Controllers\AmbulanceOrderController::class , 'update']);
    Route::post('execute/{ambulance_order}', [App\Http\Controllers\AmbulanceOrderController::class , 'execute']);
    Route::delete('destroy/{ambulance_order}', [App\Http\Controllers\AmbulanceOrderController::class , 'destroy']);
});

//get time
Route::post('time/{doctor}', [App\Http\Controllers\GetDoctorTimeController::class , 'getTime']);

//appointment
Route::prefix('appointment')->group(function(){
    Route::get('index/patient/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_patient']);
    Route::get('index/clinic/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_clinic']);
    Route::get('index/remotly/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index_remotly']);
    Route::post('add', [App\Http\Controllers\AppointmentController::class , 'store']);
    Route::get('show/{doctor}', [App\Http\Controllers\AppointmentController::class , 'show']);
    Route::post('update/{appointment}', [App\Http\Controllers\AppointmentController::class , 'update']);
    Route::post('destroy_list/{doctor}', [App\Http\Controllers\AppointmentController::class , 'destroy_list']);
    Route::delete('destroy/{appointment}', [App\Http\Controllers\AppointmentController::class , 'destroy']);
});

//record
Route::prefix('record')->group(function(){
    Route::get('index/{appointment}', [App\Http\Controllers\RecordController::class , 'index']);
    Route::get('last/{appointment}', [App\Http\Controllers\RecordController::class , 'get_last']);
    Route::post('add', [App\Http\Controllers\RecordController::class , 'store']);
    Route::post('update/{record}', [App\Http\Controllers\RecordController::class , 'update']);
    Route::delete('destroy/{record}', [App\Http\Controllers\RecordController::class , 'destroy']);
});

//device order
Route::prefix('device_order')->group(function(){
    Route::get('index', [App\Http\Controllers\DeviceOrderController::class , 'index']);
    Route::get('index/accepted', [App\Http\Controllers\DeviceOrderController::class , 'index_accepted']);
    Route::post('add', [App\Http\Controllers\DeviceOrderController::class , 'store']);
    Route::post('update/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'update']);
    Route::delete('destroy/{device_order}', [App\Http\Controllers\DeviceOrderController::class , 'destroy']);
});

Route::post('contact', [App\Http\Controllers\ContactController::class , 'contact_us']);


Route::get('h' , [App\Http\Controllers\HomeController::class , 'help']);
