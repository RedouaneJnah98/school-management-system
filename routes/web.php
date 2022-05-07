<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teacher\TeacherController;

// Home Page
Route::view('/', 'index')->name('home');

Route::prefix('student')->name('student.')->group(function () {
    Route::view('login', 'student.login')->name('login');
    Route::view('register', 'student.register')->name('register');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('login', 'admin.login')->name('login');
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');

    // Controller Resource
    Route::resource('teachers', TeacherController::class);
});
