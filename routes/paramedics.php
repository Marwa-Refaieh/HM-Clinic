<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//prefix
//paramedic
Route::get('index', [App\Http\Controllers\AmbulanceOrderController::class , 'index'])->name('ambulance_order')->middleware(['auth:admin,paramedic']);

Route::middleware(['auth:paramedic'])->group(function(){
    //paramedic profil
    Route::get('show/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'show']);
    Route::post('update/{paramedic}', [App\Http\Controllers\ParamedicController::class , 'update']);


    //ambulance order
Route::prefix('ambulance_order')->group(function(){
    Route::get('show/accepted', [App\Http\Controllers\AmbulanceOrderController::class , 'index_accepted']);
    Route::get('show/executed', [App\Http\Controllers\AmbulanceOrderController::class , 'index_executed']);
    Route::post('update/{ambulance_order}', [App\Http\Controllers\AmbulanceOrderController::class , 'update']);
    Route::post('execute/{ambulance_order}', [App\Http\Controllers\AmbulanceOrderController::class , 'execute']);
    Route::delete('destroy/{ambulance_order}', [App\Http\Controllers\AmbulanceOrderController::class , 'destroy'])->middleware('permission');
});
});
