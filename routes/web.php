<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::view('/', 'index')->name('home');

Route::prefix('student')->name('student.')->group(function () {
    Route::view('login', 'student.login')->name('login');
    Route::view('register', 'student.register')->name('register');
});

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::view('login', 'teacher.login')->name('login');

    Route::view('dashboard', 'teacher.dashboard')->name('dashboard');
});
