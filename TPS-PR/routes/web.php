<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\HRMS\EmployeesController;
use App\Http\Controllers\HRMS\DepartmentController;


Route::get('/', function () {
    return view('components.pages.home');
})->name('home');
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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(GuardianController::class)->group(function(){
        // Guardian Routes
    Route::get('/guardians', 'index')->name('guardians.index');
    Route::get('/guardians/create', 'create')->name('guardians.create');
    Route::post('/guardians/register', 'register')->name('guardian.register');
    Route::get('/guardians/register', 'showRegisterForm')->name('guardian.register.form');
    Route::get('/guardians/{id}', 'show')->name('guardians.show');
    Route::put('/guardians/{id}', 'update')->name('guardians.update');
    Route::delete('/guardians/{guardian}', 'destroy')->name('guardians.destroy');
    Route::get('/guardians/recycle-bin', 'recycleBin')->name('guardians.recycleBin');
    Route::post('/guardians/{id}/restore', 'restore')->name('guardians.restore');
    Route::delete('/guardians/{id}/force-delete', 'forceDelete')->name('guardians.forceDelete');
    Route::get('/guardians/{guardian}/assign', 'showAssignForm')->name('guardians.assign');
    Route::post('/guardians/{guardian}/assign', 'assignStudents')->name('guardians.assign.store');
    Route::get('/guardians/change-password', 'showChangePasswordForm')->name('guardians.show-change-password');
    Route::post('/guardians/change-password', 'changePassword')->name('guardians.change-password');

    });

    // Employee Routes
    Route::middleware(['auth'])->group(function () {
        Route::controller(EmployeesController::class)->group(function(){
            Route::get('/employees', 'index')->name('employees.index');
            Route::get('/employees/create', 'create')->name('employees.create');
            Route::post('/employees', 'store')->name('employees.store');
            Route::get('/employees/{id}/edit', 'edit')->name('employees.edit');
            Route::put('/employees/{id}', 'update')->name('employees.update');
            Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
        });
    });
    
    // Department Routes
Route::middleware(['auth'])->group(function () {
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/departments', 'index')->name('departments.index');
        Route::get('/departments/create', 'create')->name('departments.create');
        Route::post('/departments', 'store')->name('departments.store');
        Route::get('/departments/{id}/edit', 'edit')->name('departments.edit');
        Route::put('/departments/{id}', 'update')->name('departments.update');
        Route::delete('/departments/{id}', 'destroy')->name('departments.destroy');
    });
});
    
// Departments Routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
            Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
            Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    Route::get('/dashboard', function() {
        view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles.index');
        Route::get('/roles/create', 'create')->name('roles.create');
        Route::post('/roles', 'store')->name('roles.store');
        Route::get('/roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('/roles/{role}', 'update')->name('roles.update');
        Route::delete('/roles/{role}', 'destroy')->name('roles.destroy');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions', 'index')->name('permissions.index');
        Route::get('/permissions/create', 'create')->name('permissions.create');
        Route::post('/permissions', 'store')->name('permissions.store');
        Route::get('/permissions/{permission}/edit', 'edit')->name('permissions.edit');
        Route::put('/permissions/{permission}', 'update')->name('permissions.update');
        Route::delete('/permissions/{permission}', 'destroy')->name('permissions.destroy');
    }
    );

    Route::resource('admins', AdminController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::post('/users/{user}/assign-permission', [UserController::class, 'assignPermission'])->name('users.assignPermission');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{id}/assign', [UserController::class, 'assignForm'])->name('users.assign.form');
    Route::post('/users/{id}/assign', [UserController::class, 'assignUpdate'])->name('users.assign.update');

});




Route::prefix('guards')->group(function () {
    Route::get('/', [GuardController::class, 'index'])->name('guards.index');
    Route::get('/create', [GuardController::class, 'create'])->name('guards.create');
    Route::post('/store', [GuardController::class, 'store'])->name('guards.store');
    Route::delete('/{guard}', [GuardController::class, 'destroy'])->name('guards.destroy'); 
});





require __DIR__.'/auth.php';
require __DIR__.'/student.php';
require __DIR__.'/admin.php';
