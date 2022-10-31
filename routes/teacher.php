<?php

use App\Http\Controllers\teacher\auth\EmailVerificationNotificationController;
use App\Http\Controllers\teacher\auth\EmailVerificationPromptController;
use App\Http\Controllers\teacher\auth\PasswordResetLinkController;
use App\Http\Controllers\teacher\auth\TeacherNewPasswordController;
use App\Http\Controllers\teacher\auth\VerifyEmailController;
use App\Http\Controllers\teacher\TeacherAuthController;

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::view('/login', 'teacher.auth.login')->name('login');
        Route::post('/check', [TeacherAuthController::class, 'check_user'])->name('check');
        // Reset & Forgot Password Routes
        Route::view('/forgot-password', 'teacher.auth.forgot-password')->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::post('/reset-password', [TeacherNewPasswordController::class, 'store'])->name('password.update');
        Route::get('/reset-password/{token}', [TeacherNewPasswordController::class, 'create'])
            ->name('password.reset');
    });
//     Routes for email verification
    Route::middleware('auth:teacher')->group(function () {
        Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
            ->name('verification.notice');

        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
    });

    Route::middleware('guest')->group(function () {
        Route::view('/login', 'teacher.auth.login')->name('login');
        Route::post('/check', [TeacherAuthController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:teacher'])->group(function () {
        Route::view('/dashboard', 'teacher.dashboard')->name('dashboard');
//        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

        Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('logout');
    });

    Route::middleware(['auth:teacher', 'teacher.verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
//        // Message Controller
//        Route::get('/feedbacks', [MessageController::class, 'index'])->name('feedbacks');
//        // Dashboard Controller
//        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//        // Classroom Student
//        Route::get('/classroom-student', [ClassroomStudentController::class, 'index'])->name('classroom-student');
//        Route::post('/classroom-student', [ClassroomStudentController::class, 'store'])->name('classroom-student.store');
//        Route::post('/all_students', [ClassroomStudentController::class, 'all_students'])->name('all_students');
//        // Classroom Teacher
//        Route::get('/classroom-teacher', [ClassroomTeacherController::class, 'create'])->name('classroom-teacher');
//        Route::post('/classroom-teacher', [ClassroomTeacherController::class, 'store'])->name('classroom-teacher.store');
//        Route::post('/all_teachers', [ClassroomTeacherController::class, 'all_teachers'])->name('all_teachers');
//        // Subject 'Teacher, Branch' routes
//        Route::get('/subject-branch', [SubjectBranchController::class, 'index'])->name('subject-branch');
//        Route::post('/subject-branch', [SubjectBranchController::class, 'store'])->name('subject-branch.store');
//        Route::get('/subject-teacher', [SubjectTeacherController::class, 'index'])->name('subject-teacher');
//        Route::post('/subject-teacher', [SubjectTeacherController::class, 'store'])->name('subject-teacher.store');
//        Route::post('/all-subject-teachers', [SubjectTeacherController::class, 'related_teachers'])->name('all-subject-teachers');
//        Route::post('/all-subject-branches', [SubjectTeacherController::class, 'related_branches'])->name('all-subject-branches');
//        // Download PDF
//        Route::get('/download_students', [DownloadController::class, 'download_students'])->name('download_students');
//        Route::get('/download_parents', [DownloadController::class, 'download_parents'])->name('download_parents');
//        Route::get('/download_teachers', [DownloadController::class, 'download_teachers'])->name('download_teachers');
//        // Soft Delete Student Model
//        Route::get('/trashed', [SoftDeleteController::class, 'trashed'])->name('trashed');
//        Route::get('/restore_student/{id}', [SoftDeleteController::class, 'restore_student'])->name('restore_student');
//        Route::delete('/force_delete/{id}', [SoftDeleteController::class, 'force_delete'])->name('force_delete');
//        // Views Routes
        Route::view('/settings', 'teacher.settings')->name('settings');
//        // Update password from settings
//        Route::post('/update-password', [TeacherAuthController::class, 'update_password'])->name('update-password');
//
//        // Resource Controllers
//        Route::resource('/teachers', TeacherAuthController::class);
//        Route::resource('/students', StudentController::class);
//        Route::resource('/parents', ParentController::class);
//        Route::resource('/groups', GroupController::class)->except('show');
//        Route::resource('/branches', BranchController::class)->except('show');
//        Route::resource('/classrooms', ClassroomController::class)->except('show');
//        Route::resource('/subjects', SubjectController::class)->except('show');
//        Route::resource('/attendances', AttendanceController::class)->except(['show', 'store']);

        // Logout
        Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('logout');
    });
});
