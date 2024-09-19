<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;

// Route::get('/', [AuthController::class, 'entry'])->name('entry');
Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/otp', [AuthController::class, 'otpForm'])->name('verify.otp');
Route::post('/otp', [AuthController::class, 'verifyOtp'])->name('verify.otp.submit');
Route::get('/classes', [ClassController::class, 'listing'])->name('classes.list');
