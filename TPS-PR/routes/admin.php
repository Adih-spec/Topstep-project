<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportCardController;
use App\Http\Controllers\ReportCardConfigurationController;




// Public admin authentication routes
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// Protected admin routes
Route::middleware('is_admin:admin')->prefix('admin')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    // Guards
    Route::resource('guards', GuardController::class);
    Route::get('guards/{guard}/permissions', [GuardController::class, 'editPermissions'])->name('guards.permissions');
    Route::post('guards/{guard}/permissions', [GuardController::class, 'updatePermissions'])->name('guards.permissions.update');

    // Roles
    Route::resource('roles', RoleController::class);

    // Permissions
    Route::resource('permissions', PermissionController::class);

    // Admins
    Route::resource('admins', AdminController::class);

    // Users
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users.index');
        Route::get('/users/create', 'create')->name('admin.users.create');
        Route::post('/users', 'store')->name('admin.users.store');
        Route::get('/users/{user}/edit', 'edit')->name('admin.users.edit');
        Route::put('/users/{user}', 'update')->name('admin.users.update');
        Route::delete('/users/{user}', 'destroy')->name('admin.users.destroy');
    });

    // Report Cards
    Route::get('/report-cards/create', [ReportCardController::class, 'create'])->name('report-cards.create');
    Route::post('/report-cards', [ReportCardController::class, 'store'])->name('report-cards.store');

    // Media
    Route::resource('media', MediaController::class);
    Route::get('/report-cards', [ReportCardController::class, 'store'])
        ->name('report-cards.store');

    Route::get('/report-configs', [ReportCardConfigurationController::class, 'index']);

});

    
