<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


    // Guest middleware
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/account/login',[LoginController::class, 'index'])->name('account.login');
        Route::get('/account/register',[LoginController::class, 'register'])->name('account.register');
        Route::post('/account/process-register',[LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('/account/authenticate',[LoginController::class, 'authenticate'])->name('account.authenticate');
    });
    // Authenticated middleware
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/account/logout',[LoginController::class, 'logout'])->name('account.logout');
        Route::get('/Pegawai', [PegawaiController::class, 'index'])->name('Pegawai.index');
        Route::post('/Pegawai', [PegawaiController::class, 'store'])->name('Pegawai.store');
        Route::get('/Pegawai/create', [PegawaiController::class, 'create'])->name('Pegawai.create');
        Route::get('/Pegawai/{Pegawai}', [PegawaiController::class, 'show'])->name('Pegawai.show');
        Route::put('/Pegawai/{Pegawai}', [PegawaiController::class, 'update'])->name('Pegawai.update');
        Route::delete('/Pegawai/{Pegawai}', [PegawaiController::class, 'destroy'])->name('Pegawai.destroy');
        Route::get('/Pegawai/{Pegawai}/edit', [PegawaiController::class, 'edit'])->name('Pegawai.edit');
    });





