<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\CarController;
use App\Http\Controllers\Main\CarSellingController;
use App\Http\Controllers\Main\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'auth.'], function() {

    Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'doLogin'])->name('postlogin');

    Route::get('/register', [RegisterController::class, 'getRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'postRegister'])->name('postregister');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/cars', CarController::class)->except('show');
    Route::resource('/car-selling', CarSellingController::class)->except('show');
});
