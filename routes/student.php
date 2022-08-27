<?php

use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\student\LoginController;
use App\Http\Controllers\student\ProfileController;

Route::prefix('student')->name('student.')->group(function () {
    Route::middleware(['guest:student'])->group(function () {
        Route::view('/login', 'student.login')->name('login');
        Route::post('/check', [LoginController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:student'])->group(function () {
        Route::view('/dashboard', 'student.dashboard')->name('dashboard');
        Route::view('/settings', 'student.settings')->name('settings');
        Route::view('/support', 'student.support')->name('support');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/send_message', [MessageController::class, 'store_student_message'])->name('send_message');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
