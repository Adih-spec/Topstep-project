<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\UserManagementController;

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
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users.index');
        Route::get('/admins/{edit}/edit', [AdminController::class, 'edit'])->name('admins.edit');
Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');

        Route::get('/users/create', 'create')->name('admin.users.create');
        Route::post('/users', 'store')->name('admin.users.store');
        Route::get('/users/{user}/edit', 'edit')->name('admin.users.edit');
        Route::put('/users/{user}', 'update')->name('admin.users.update');
        Route::delete('/users/{user}', 'destroy')->name('admin.users.destroy');
    });
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
