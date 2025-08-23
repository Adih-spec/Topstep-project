<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\StudentController;

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Teacher Dashboard
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

// Staff Dashboard
Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
});

// Guardian Dashboard
Route::middleware(['auth', 'role:guardian'])->group(function () {
    Route::get('/guardian/dashboard', [GuardianController::class, 'index'])->name('guardian.dashboard');
});

// Student Dashboard
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});



Route::get('/admin-dashboard', function () {
    return view('dashboard.admin');
})->middleware(['auth', 'role:admin']);

Route::get('/teacher-dashboard', function () {
    return view('dashboard.teacher');
})->middleware(['auth', 'role:teacher']);

Route::get('/staff-dashboard', function () {
    return view('dashboard.staff');
})->middleware(['auth', 'role:staff']);

Route::get('/guardian-dashboard', function () {
    return view('dashboard.guardian');
})->middleware(['auth', 'role:guardian']);

require __DIR__.'/auth.php';
