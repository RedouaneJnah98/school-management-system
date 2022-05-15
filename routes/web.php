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
    Route::middleware(['guest:web'])->group(function () {
        Route::view('login', 'admin.login')->name('login');
        Route::post('check', [TeacherController::class, 'check_user'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function () {
        // Route View
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
        Route::view('profile', 'admin.profile')->name('profile');

        // Resource Controllers
        Route::resource('teachers', TeacherController::class);

        // Logout
        Route::post('logout', [TeacherController::class, 'logout'])->name('logout');
    });
});
