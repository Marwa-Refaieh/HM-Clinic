<?php

use App\Jobs\SendNotificationJob;
use App\Models\appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'get_info'])->name('home');


// Route::get('/demo/doctors', function () {
//     return view('demo.doctors');
// });

#################DEMO#################
//info in demo
// Route::get('get_info' , [App\Http\Controllers\HomeController::class , 'get_info']);

//category
Route::get('category/index', [App\Http\Controllers\CategoryController::class , 'index']);
//article
Route::prefix('artical')->group(function (){
    Route::get('index/{category}', [App\Http\Controllers\ArticleController::class , 'index'])->name('articles');
    Route::get('show/{article}', [App\Http\Controllers\ArticleController::class , 'show']);
});


//select in record device
// Route::prefix('home')->group(function(){
//     Route::get('index', [App\Http\Controllers\DeviceController::class , 'index']);
// });

//doctor
Route::prefix('doctor')->group(function(){
    Route::get('index', [App\Http\Controllers\DoctorController::class , 'index_view'])->name('doctors');
    Route::get('show/{doctor}', [App\Http\Controllers\DoctorController::class , 'show'])->name('doctor.show');
    Route::get('price/{doctor}', [App\Http\Controllers\DoctorController::class , 'get_price']);
    Route::get('dashboard/price/{doctor}', [App\Http\Controllers\DoctorController::class , 'get_price_dashboard']);
});
//get time
Route::post('time/{doctor}', [App\Http\Controllers\GetDoctorTimeController::class , 'getTime']);

//get time dashboard
Route::POST('dashboard/time/{doctor}', [App\Http\Controllers\GetDoctorTimeController::class , 'getTime']);

//ambulance order
Route::prefix('ambulance_order')->group(function(){
    Route::post('add', [App\Http\Controllers\AmbulanceOrderController::class , 'store']);
});

//contact us
Route::get('contact/index', [App\Http\Controllers\ContactController::class , 'contact'])->name('contact');
Route::post('contact', [App\Http\Controllers\ContactController::class , 'contact_us']);

//sign up / log in
// Route::get('/demo/login', function () {
//     return view('demo.login');
// });

Route::get('checkLogin',[App\Http\Controllers\UserController::class , 'checkLogin']);
Route::get('userId',[App\Http\Controllers\UserController::class , 'getUserId']);
// Route::post('login', [App\Http\Controllers\UserController::class , 'login']);
// Route::post('store', [App\Http\Controllers\UserController::class , 'store']);

##############LOG IN##############
//delete user
Route::post('destroy/{user}', [App\Http\Controllers\UserController::class , 'destroy'])->middleware(['auth:user','permission']);
Route::post('destroy/{user}', [App\Http\Controllers\UserController::class , 'destroy'])->middleware(['auth:user','permission']);

//appointment


Route::prefix('appointment')->group(function(){
    // Route::post('add', [App\Http\Controllers\AppointmentController::class , 'store'])->middleware(['auth:user']);
    Route::get('index/{doctor}', [App\Http\Controllers\AppointmentController::class , 'index']);
    Route::post('add', [App\Http\Controllers\AppointmentController::class , 'store']);
});


