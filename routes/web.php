<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::view('/', 'index')->name('home');

Route::prefix('student')->group(function () {
    Route::view('login', 'student.login')->name('login');
    Route::view('register', 'student.register')->name('register');
});
