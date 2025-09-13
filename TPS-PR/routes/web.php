<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ProgramsController;



Route::get('/', function () {
    return view('components.pages.home');
})->name('home');
Route::get('/home', [HomePageController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about-us');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
Route::get('/programs', [ProgramsController::class, 'index'])->name('Programs.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
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
