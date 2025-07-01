<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', UserController::class)->middleware(['auth']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::resource('/jabatan', JabatanController::class)->middleware('auth');
Route::resource('departemen', DepartemenController::class)
    ->parameters(['departemen' => 'departemen'])
    ->middleware('auth');
Route::resource('/karyawan', KaryawanController::class);
