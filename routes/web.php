<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AbsensiController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/presensi', [AbsensiController::class, 'formAbsen'])->name('absensi.presensi');
    Route::post('/presensi/simpan', [AbsensiController::class, 'simpanAbsen'])->name('absensi.simpan');
});



Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/users/{id}/approve', [UserController::class, 'approve'])->name('users.approve');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);

    Route::middleware('role:admin')->group(function () {
        Route::resource('/users', UserController::class);
    });

    Route::middleware('role:admin,hrd')->group(function () {
        Route::resource('/jabatan', JabatanController::class);
        Route::resource('/departemen', DepartemenController::class)
            ->parameters(['departemen' => 'departemen']);
    });

    Route::middleware('role:admin,hrd,manager')->group(function () {
        Route::resource('/karyawan', KaryawanController::class);
    });
    Route::resource('absensi', AbsensiController::class);

});
