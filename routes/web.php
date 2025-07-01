<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('/', DashboardController::class); 
Route::resource('/dashboard', DashboardController::class);
Route::resource('/jabatan', JabatanController::class);
Route::resource('departemen', DepartemenController::class)->parameters([
    'departemen' => 'departemen'
]);
 
Route::resource('/karyawan', KaryawanController::class);
