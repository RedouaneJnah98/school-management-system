<?php

use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\student\auth\EmailVerificationNotificationController;
use App\Http\Controllers\student\auth\EmailVerificationPromptController;
use App\Http\Controllers\student\auth\NewPasswordController;
use App\Http\Controllers\student\auth\PasswordResetLinkController;
use App\Http\Controllers\student\auth\VerifyEmailController;
use App\Http\Controllers\student\LoginController;
use App\Http\Controllers\student\ProfileController;

Route::prefix('student')->name('student.')->group(function () {
    Route::middleware(['guest:student'])->group(function () {
        Route::view('/login', 'student.auth.login')->name('login');
        Route::post('/check', [LoginController::class, 'check'])->name('check');
        Route::view('/forgot-password', 'student.auth.forgot-password')->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, '__invoke'])->name('password.email');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
            ->middleware('guest')
            ->name('password.reset');
    });
    // Routes for email verification
    Route::middleware('auth:student')->group(function () {
        Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
            ->name('verification.notice');

        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
    });

    Route::middleware(['auth:student', 'student.verified'])->group(function () {
        Route::view('/dashboard', 'student.dashboard')->name('dashboard');
        Route::view('/settings', 'student.settings')->name('settings');
        Route::view('/support', 'student.support')->name('support');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/send_message', [MessageController::class, 'store_student_message'])->name('send_message');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
