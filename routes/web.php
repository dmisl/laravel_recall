<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('login/restore', [PasswordResetController::class, 'index'])->name('reset.index');

Route::get('profile', [UserController::class, 'index'])->name('profile.index');

Route::fallback(function () {
    return redirect()->route('login.index');
});
