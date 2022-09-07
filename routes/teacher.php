<?php

use App\Http\Controllers\admin\AttendanceController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\ClassroomController;
use App\Http\Controllers\admin\ClassroomStudentController;
use App\Http\Controllers\admin\ClassroomTeacherController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DownloadController;
use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\NewPasswordController;
use App\Http\Controllers\admin\PasswordResetLinkController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SubjectBranchController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\SubjectTeacherController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\parent\ParentController;
use App\Http\Controllers\SoftDeleteController;
use App\Http\Controllers\student\StudentController;

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('guest')->name('password.reset');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::view('/login', 'admin.auth.login')->name('login');
        Route::post('/check', [TeacherController::class, 'check_user'])->name('check');
        // Reset & Forgot Password Routes
        Route::view('/forgot-password', 'admin.auth.forgot-password')->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth:web'])->group(function () {
        // Profile Controller
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        // Message Controller
        Route::get('/feedbacks', [MessageController::class, 'index'])->name('feedbacks');
        // Dashboard Controller
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Classroom Student
        Route::get('/classroom-student', [ClassroomStudentController::class, 'index'])->name('classroom-student');
        Route::post('/classroom-student', [ClassroomStudentController::class, 'store'])->name('classroom-student.store');
        Route::post('/all_students', [ClassroomStudentController::class, 'all_students'])->name('all_students');
        // Classroom Teacher
        Route::get('/classroom-teacher', [ClassroomTeacherController::class, 'create'])->name('classroom-teacher');
        Route::post('/classroom-teacher', [ClassroomTeacherController::class, 'store'])->name('classroom-teacher.store');
        // Subject 'Teacher, Branch' routes
        Route::get('/subject-branch', [SubjectBranchController::class, 'index'])->name('subject-branch');
        Route::post('/subject-branch', [SubjectBranchController::class, 'store'])->name('subject-branch.store');
        Route::get('/subject-teacher', [SubjectTeacherController::class, 'index'])->name('subject-teacher');
        Route::post('/subject-teacher', [SubjectTeacherController::class, 'store'])->name('subject-teacher.store');
        Route::post('/all-subject-teachers', [SubjectTeacherController::class, 'related_teachers'])->name('all-subject-teachers');
        Route::post('/all-subject-branches', [SubjectTeacherController::class, 'related_branches'])->name('all-subject-branches');
        // Download PDF
        Route::get('/download_students', [DownloadController::class, 'download_students'])->name('download_students');
        Route::get('/download_parents', [DownloadController::class, 'download_parents'])->name('download_parents');
        Route::get('/download_teachers', [DownloadController::class, 'download_teachers'])->name('download_teachers');
        // Soft Delete Student Model
        Route::get('/trashed', [SoftDeleteController::class, 'trashed'])->name('trashed');
        Route::get('/restore_student/{id}', [SoftDeleteController::class, 'restore_student'])->name('restore_student');
        Route::delete('/force_delete/{id}', [SoftDeleteController::class, 'force_delete'])->name('force_delete');
        // Views Routes
        Route::view('/settings', 'admin.settings')->name('settings');
        // Update password from settings
        Route::post('/update-password', [TeacherController::class, 'update_password'])->name('update-password');

        // Resource Controllers
        Route::resource('/teachers', TeacherController::class);
        Route::resource('/students', StudentController::class);
        Route::resource('/parents', ParentController::class);
        Route::resource('/groups', GroupController::class)->except('show');
        Route::resource('/branches', BranchController::class)->except('show');
        Route::resource('/classrooms', ClassroomController::class)->except('show');
        Route::resource('/subjects', SubjectController::class)->except('show');
        Route::resource('/attendances', AttendanceController::class)->except('show');

        // Logout
        Route::post('/logout', [TeacherController::class, 'logout'])->name('logout');
    });
});
