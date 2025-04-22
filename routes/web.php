<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('restore', function () {
    return view('restore');
})->name('restore');

