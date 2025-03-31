<?php

use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RawatInapController;
use App\Livewire\Pasien\CreatePasien;
use App\Livewire\Pasien\EditPasien;
use App\Livewire\Pasien\PasienIndex;
use App\Livewire\RawatInap\CreateRawatInap;
use App\Livewire\RawatInap\EditRawatInap;
use App\Livewire\RawatInap\RawatInap;
use App\Livewire\RawatInap\ShowRawatInap;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register')
    ->middleware('guest');
Route::post('/logout', [LogoutController::class, 'logout', 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/email/verify', [EmailController::class, 'showVerificationNotice'])
    ->middleware(['auth', 'redirectIfVerified'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verifyEmail'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailController::class, 'resendVerificationEmail'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// Admin Page
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/pasien', PasienIndex::class)->name('pasien.index');
    Route::get('/pasien/create', CreatePasien::class)->name('pasien.create');
    Route::get('/pasien/edit/{pasien}', EditPasien::class)->name('pasien.edit');
    Route::post('/pasien/delete/{pasien}', EditRawatInap::class)->name('pasien.destroy');
});

// Rawat Inap Controller 
Route::middleware(['auth'])->group(function () {
    Route::get('/rawat', RawatInap::class)->name('rawat.index');
    Route::get('/rawat/create', CreateRawatInap::class)->name('rawat.create');
    Route::get('/rawat/show/{rawatInap}', ShowRawatInap::class)->name('rawat.show');
    Route::get('/rawat/edit/{rawatInap}', EditRawatInap::class)->name('rawat.edit');
});
Route::get('/', function () {
    return view('welcome');
});
