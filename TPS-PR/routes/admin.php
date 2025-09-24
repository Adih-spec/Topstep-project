<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportCardController;

Route::prefix('admin')->middleware('guest:admin')->group(function(){
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

});
Route::middleware('is_admin:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // Other admin routes can be added here
    Route::resource('guards', GuardController::class);

    // Additional routes for guard permissions
    Route::get('guards/{guard}/permissions', [GuardController::class, 'editPermissions'])->name('guards.permissions');
    Route::post('guards/{guard}/permissions', [GuardController::class, 'updatePermissions'])->name('guards.permissions.update');

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
        Route::resource('permissions', PermissionController::class);
    });

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

    Route::get('/report-cards/create', [ReportCardController::class, 'create'])
    ->name('report-cards.create');

    Route::get('/report-cards', [ReportCardController::class, 'store'])
        ->name('report-cards.store');
});