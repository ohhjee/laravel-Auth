<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Verifymail;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\TokenVerification;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('posts.index');
})->name('posts.index');

Route::middleware("auth")->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/logout', [LogoutController::class, 'store'])->name('logout');
});

Route::middleware("guest")->group(function () {
    Route::resource("register", RegisterController::class);
    Route::resource("login", LoginController::class);

    Route::get('/token-verification/{token}', [TokenVerification::class, 'index'])->name('TokenVerification.show');
    Route::post('/reset-password', [TokenVerification::class, 'store'])->name("token-verification");

    Route::get('/VerifyMail', [Verifymail::class, 'index'])->name('VerifyMail');
    Route::post('/VerifyMail', [Verifymail::class, 'store']);
});

