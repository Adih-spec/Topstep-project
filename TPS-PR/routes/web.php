<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\UserManagementController;


Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/home', [HomePageController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about-us');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/guardians/login', [GuardianController::class, 'showLoginForm'])->name('guardian.login');
Route::post('/guardians/login', [GuardianController::class, 'login'])->name('guardian');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guardians/logout', [GuardianController::class, 'logout'])->name('guardian.logout');
Route::get('/guardians/dashboard', function () {
    return view('guardians.dashboard');
})->name('guardian.dashboard')->middleware('auth:guardian');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::controller(GuardianController::class)->group(function(){
    //     // Guardian Routes
    // Route::get('/guardians', 'index')->name('guardians.index');
    // Route::get('/guardians/create', 'create')->name('guardians.create');
    // Route::post('/guardians/register', 'register')->name('guardian.register');
    // Route::get('/guardians/register', 'showRegisterForm')->name('guardian.register.form');
    // Route::get('/guardians/{id}', 'show')->name('guardians.show');
    // Route::put('/guardians/{id}', 'update')->name('guardians.update');
    // Route::delete('/guardians/{guardian}', 'destroy')->name('guardians.destroy');
    // Route::get('/guardians/recycle-bin', 'recycleBin')->name('guardians.recycleBin');
    // Route::post('/guardians/{id}/restore', 'restore')->name('guardians.restore');
    // Route::delete('/guardians/{id}/force-delete', 'forceDelete')->name('guardians.forceDelete');
    // Route::get('/guardians/{guardian}/assign', 'showAssignForm')->name('guardians.assign');
    // Route::post('/guardians/{guardian}/assign', 'assignStudents')->name('guardians.assign.store');
    // Route::get('/guardians/change-password', 'showChangePasswordForm')->name('guardians.show-change-password');
    // Route::post('/guardians/change-password', 'changePassword')->name('guardians.change-password');

    // });

    // Employee Routes
    // Route::middleware(['auth'])->group(function () {
    //     Route::controller(EmployeesController::class)->group(function(){
    //         Route::get('/employees', 'index')->name('employees.index');
    //         Route::get('/employees/create', 'create')->name('employees.create');
    //         Route::post('/employees', 'store')->name('employees.store');
    //         Route::get('/employees/{id}/edit', 'edit')->name('employees.edit');
    //         Route::put('/employees/{id}', 'update')->name('employees.update');
    //         Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
    //     });
    // });
    
    // Department Routes
// Route::middleware(['auth'])->group(function () {
//     Route::controller(DepartmentController::class)->group(function () {
//         Route::get('/departments', 'index')->name('departments.index');
//         Route::get('/departments/create', 'create')->name('departments.create');
//         Route::post('/departments', 'store')->name('departments.store');
//         Route::get('/departments/{id}/edit', 'edit')->name('departments.edit');
//         Route::put('/departments/{id}', 'update')->name('departments.update');
//         Route::delete('/departments/{id}', 'destroy')->name('departments.destroy');
//     });
// });

// Employee Attendance Routes
// Route::middleware(['auth'])->group(function () {
//     Route::controller(EmployeesAttendanceController::class)->group(function () {
//         Route::get('/attendances', 'index')->name('attendances.index');
//         Route::get('/attendances/create', 'create')->name('attendances.create');
//         Route::post('/attendances', 'store')->name('attendances.store');
//         Route::get('/attendances/{id}', 'show')->name('attendances.show');
//         Route::get('/attendances/{id}/edit', 'edit')->name('attendances.edit');
//         Route::put('/attendances/{id}', 'update')->name('attendances.update');
//         Route::delete('/attendances/{id}', 'destroy')->name('attendances.destroy');
//     });
// });



    Route::get('/dashboard', function() {
        view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'staffs'], function () {
        Route::get('/', [TeachersController::class, 'index'])->name('teachers.index');
        Route::get('/create', [TeachersController::class, 'create'])->name('teachers.create');
        Route::post('/', [TeachersController::class, 'store'])->name('teachers.store');
        Route::get('/{id}/edit', [TeachersController::class, 'edit'])->name('teachers.edit');
        Route::put('/{id}', [TeachersController::class, 'update'])->name('teachers.update');
        Route::delete('/{id}', [TeachersController::class, 'destroy'])->name('teachers.destroy');
    });

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::post('/users/{user}/assign-permission', [UserController::class, 'assignPermission'])->name('users.assignPermission');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{id}/assign', [UserController::class, 'assignForm'])->name('users.assign.form');
    Route::post('/users/{id}/assign', [UserController::class, 'assignUpdate'])->name('users.assign.update');
});

require __DIR__.'/auth.php';
require __DIR__.'/student.php';
require __DIR__.'/admin.php';
require __DIR__.'/staff.php';
