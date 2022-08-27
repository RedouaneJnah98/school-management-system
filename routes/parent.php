<?php

use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\parent\AuthController;
use App\Http\Controllers\parent\ProfileController;

Route::prefix('parent')->name('parent.')->group(function () {
    Route::middleware(['guest:parent'])->group(function () {
        Route::view('/login', 'parent.login')->name('login');
        Route::post('/check', [AuthController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:parent'])->group(function () {
        Route::view('/dashboard', 'parent.dashboard')->name('dashboard');
        Route::view('/support', 'parent.support')->name('support');
        Route::view('/settings', 'parent.settings')->name('settings');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/send_message', [MessageController::class, 'store_parent_message'])->name('send_message');

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
