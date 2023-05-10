<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

// Doctor route
Route::get('/doctors/index',[DoctorController::class,'index'])->name('doctor.index');
Route::post('/doctors/store',[DoctorController::class,'store'])->name('doctor.store');
Route::post('/doctors/update',[DoctorController::class,'update'])->name('doctor.update');
Route::any('/doctors/destroy/{id}',[DoctorController::class,'destroy'])->name('doctor.destroy');

//Patient's route
Route::get('/patient/login',[PatientController::class,'index'])->name('patient.login');
Route::get('/patient/store',[PatientController::class,'store'])->name('patient.store');
