<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuardianController;

Route::get('/', function () {
    return view('components.pages.home');
})->name('home');
Route::get('/home', [HomePageController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about-us');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/guardians/login', [GuardianController::class, 'showLoginForm'])->name('guardian.login');
Route::post('/guardians/login', [GuardianController::class, 'login'])->name('guardian');
Route::get('/guardians/logout', [GuardianController::class, 'logout'])->name('guardian.logout');
Route::get('/guardians/dashboard', function () {
    return view('guardians.dashboard');})->name('guardian.dashboard')->middleware('auth:guardian');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    });
});

require __DIR__.'/auth.php';
