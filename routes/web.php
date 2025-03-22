<?php

use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::get('/email/verify', [EmailController::class, 'showVerificationNotice'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verifyEmail'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailController::class, 'resendVerificationEmail'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/', function () {
    return view('welcome');
})->name('home');
