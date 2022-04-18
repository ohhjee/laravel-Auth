<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Verifymail;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\TokenVerification;
use App\Http\Controllers\Auth\RegisterController;


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
    return view('posts.index');
})->name('posts.index');

Route::middleware("auth")->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/VerifyMail', [Verifymail::class, 'index'])->name('VerifyMail');
Route::post('/VerifyMail', [Verifymail::class, 'store']);


Route::get('/token-verification', [TokenVerification::class, 'index'])->name('TokenVerification');
Route::post('/token-verification/{token}', [TokenVerification::class, 'show'])->name('TokenVerification.show');
Route::post('/token-verification', [TokenVerification::class, 'store']);


