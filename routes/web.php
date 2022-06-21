<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
Route::get('/add_doctor_view',[AdminController::class,'add_view']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/my_appointment',[HomeController::class,'my_appointment']);
Route::get('/show_appointment',[AdminController::class,'show_appointment']);
Route::get('/approve/{id}',[AdminController::class,'approve']);
Route::get('/canceled/{id}',[AdminController::class,'cancel']);
Route::get('/update/{id}',[AdminController::class,'update']);
Route::get('/delete/{id}',[AdminController::class,'delete']);
Route::post('/update_doctor/{id}',[AdminController::class,'update_doctor']);
Route::get('/show_doctor',[AdminController::class,'show_doctor']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);

Route::get('/home',[HomeController::class,'redirect']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
