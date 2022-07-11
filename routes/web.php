<?php

use App\Http\Controllers\parent\ParentController;
use App\Http\Controllers\SoftDeleteController;
use App\Http\Controllers\student\LoginController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\AttendanceController;
use App\Http\Controllers\teacher\BranchController;
use App\Http\Controllers\teacher\ClassroomStudentController;
use App\Http\Controllers\teacher\ClassroomTeacherController;
use App\Http\Controllers\teacher\DashboardController;
use App\Http\Controllers\teacher\DownloadController;
use App\Http\Controllers\teacher\GradeController;
use App\Http\Controllers\teacher\ProfileController;
use App\Http\Controllers\teacher\ClassroomController;
use App\Http\Controllers\teacher\SubjectController;
use App\Http\Controllers\teacher\TeacherController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::view('/', 'index')->name('home');

/*
 * Student Prefix
 */
Route::prefix('student')->name('student.')->group(function () {
    Route::middleware(['guest'])->group(function () {
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

/*
 * Parent Prefix
 */
Route::prefix('parent')->name('parent.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::view('login', 'parent.login')->name('login');
//        Route::post('check', [LoginController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:parent'])->group(function () {
        Route::view('dashboard', 'parent.dashboard')->name('dashboard');
    });
});

/*
 * Admin Prefix
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::view('login', 'admin.login')->name('login');
        Route::post('check', [TeacherController::class, 'check_user'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function () {
        // Profile Controller
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('update', [ProfileController::class, 'update'])->name('update');
        // Dashboard Controller
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Classroom Student
        Route::get('classroom-student', [ClassroomStudentController::class, 'index'])->name('classroom-student');
        Route::post('classroom-student', [ClassroomStudentController::class, 'store'])->name('classroom-student.store');
        Route::get('all_students/{id}', [ClassroomStudentController::class, 'all_students'])->name('all_students');
        // Classroom Teacher
        Route::get('classroom-teacher', [ClassroomTeacherController::class, 'create'])->name('classroom-teacher');
        Route::post('classroom-teacher', [ClassroomTeacherController::class, 'store'])->name('classroom-teacher.store');
        // Download PDF
        Route::get('download_students', [DownloadController::class, 'download_students'])->name('download_students');
        Route::get('download_parents', [DownloadController::class, 'download_parents'])->name('download_parents');
        Route::get('download_teachers', [DownloadController::class, 'download_teachers'])->name('download_teachers');
        // Soft Delete Student Model
        Route::get('trashed', [SoftDeleteController::class, 'trashed'])->name('trashed');
        Route::get('restore_student/{id}', [SoftDeleteController::class, 'restore_student'])->name('restore_student');
        Route::delete('force_delete/{id}', [SoftDeleteController::class, 'force_delete'])->name('force_delete');
        // Support Page
        Route::view('support', 'admin.support')->name('support');
        // Settings Page
        Route::view('settings', 'admin.settings')->name('settings');

        // Resource Controllers
        Route::resource('teachers', TeacherController::class);
        Route::resource('students', StudentController::class);
        Route::resource('parents', ParentController::class);
        Route::resource('grades', GradeController::class)->except('show');
        Route::resource('branches', BranchController::class)->except('show');
        Route::resource('classrooms', ClassroomController::class)->except('show');
        Route::resource('subjects', SubjectController::class)->except('show');
        Route::resource('attendances', AttendanceController::class)->except('show');

        // Logout
        Route::post('logout', [TeacherController::class, 'logout'])->name('logout');
    });
});
