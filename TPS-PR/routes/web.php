<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserManagementController;


Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/home', [HomePageController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about-us');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/guardians/login', [GuardianController::class, 'showLoginForm'])->name('guardian.login');
Route::post('/guardians/login', [GuardianController::class, 'login'])->name('guardian');
Route::get('/guardians/logout', [GuardianController::class, 'logout'])->name('guardian.logout');
Route::get('/guardians/dashboard', function () {
    return view('guardians.dashboard');
})->name('guardian.dashboard')->middleware('auth:guardian');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(GuardianController::class)->group(function(){
        // Guardian Routes
        Route::get('/guardians', 'index')->name('guardians.index');
        Route::get('/guardians/create', 'create')->name('guardians.create');
        Route::get('/guardians/register', 'showRegisterForm')->name('guardian.register.form');
        Route::post('/guardians/register', 'register')->name('guardian.register');
        Route::get('/guardians/{id}', 'show')->name('guardians.show');
        Route::get('/guardians/{id}/edit', 'edit')->name('guardians.edit');
        Route::put('/guardians/{id}', 'update')->name('guardians.update');
        Route::delete('/guardians/{guardian}', 'destroy')->name('guardians.destroy');
        Route::get('/guardians/{guardian}/assign', 'showAssignForm')->name('guardians.assign');
        Route::post('/guardians/{guardian}/assign', 'assignStudent')->name('guardians.assign.store');
    });
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
