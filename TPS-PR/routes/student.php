<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::controller(StudentController::class)->group(function()  {

        // Basic CRUD
        Route::get('/students', 'index')->name('students.index'); 
        Route::get('/students/register', 'create')->name('students.create'); 
        Route::post('/students', 'store')->name('students.store');
        Route::get('/students/{student}/edit', 'edit')->name('students.edit');
        Route::put('/students/{student}', 'update')->name('students.update');
        Route::delete('/students/{student}', 'destroy')->name('students.destroy');

        // Soft delete & restore
        Route::get('/students-deleted', 'deleted')->name('students.deleted');
        Route::post('/students/{id}/restore', 'restore')->name('students.restore');
    });
    Route::get('/students/{id}/view', [StudentController::class, 'view'])->name('students.view');

// Recycle bin page
Route::get('/students/recycle', [StudentController::class, 'recycle'])->name('students.recycle');

Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');
});

