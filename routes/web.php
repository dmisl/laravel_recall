<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    
    Route::get('login', [AuthController::class, 'index'])->name('login.index');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('login/restore', [PasswordResetController::class, 'index'])->name('reset.index');

});

Route::middleware(['authenticated'])->group(function () {
    
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('verify', [VerifyController::class, 'index'])->name('verify.index');
    Route::post('verify', [VerifyController::class, 'store'])->name('verify.store');

});

Route::middleware(['mail_verified'])->group(function () {
    
    Route::get('profile', [UserController::class, 'index'])->name('profile.index');

});


Route::fallback(function () {
    return redirect()->route('login.index');
});
