<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRMS\EmployeesController;
// Public admin authentication routes
Route::prefix('staff')->middleware('guest:staff')->group(function () {
    Route::get('/login', [EmployeesController::class, 'showLoginForm'])->name('staff.login');
    Route::post('/login', [EmployeesController::class, 'login'])->name('staff.login.submit');
});

// Protected staff routes
Route::middleware('is_admin:staff')->prefix('staff')->group(function () {
    Route::post('/logout', [EmployeesController::class, 'logout'])->name('staff.logout');
    Route::get('/dashboard', [EmployeesController::class, 'dashboard'])->name('staff.dashboard');
    
    // Profile routes
    Route::get('/profile', [EmployeesController::class, 'show'])->name('staff.profile');
    Route::get('/profile/edit', [EmployeesController::class, 'edit'])->name('staff.profile.edit');
    Route::put('/profile', [EmployeesController::class, 'update'])->name('staff.profile.update');
    
    // Change password routes
    Route::get('/change-password', [EmployeesController::class, 'showChangePasswordForm'])->name('staff.change-password');
    Route::post('/change-password', [EmployeesController::class, 'changePassword'])->name('staff.change-password.submit');
});