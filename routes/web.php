<?php

use App\Http\Controllers\parent\ParentController;
use App\Http\Controllers\student\LoginController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\GradeController;
use App\Http\Controllers\teacher\ProfileController;
use App\Http\Controllers\teacher\ClassroomController;
use App\Http\Controllers\teacher\TeacherController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::view('/', 'index')->name('home');

Route::prefix('student')->name('student.')->group(function () {
    Route::middleware(['guest:student'])->group(function () {
        Route::view('login', 'student.login')->name('login');
        Route::post('check', [LoginController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:student'])->group(function () {
        Route::view('dashboard', 'student.dashboard')->name('dashboard');
        Route::get('profile', [\App\Http\Controllers\student\ProfileController::class, 'index'])->name('profile');
        Route::put('update', [\App\Http\Controllers\student\ProfileController::class, 'update'])->name('update');


        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('login', 'admin.login')->name('login');
        Route::post('check', [TeacherController::class, 'check_user'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function () {
        // Profile Controller
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('update', [ProfileController::class, 'update'])->name('update');
        // Route View
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');

        // Resource Controllers
        Route::resource('teachers', TeacherController::class);
        Route::resource('students', StudentController::class);
        Route::resource('parents', ParentController::class);
        Route::resource('grades', GradeController::class)->except('show');
        Route::resource('classes', ClassroomController::class);

        // Logout
        Route::post('logout', [TeacherController::class, 'logout'])->name('logout');
    });
});
