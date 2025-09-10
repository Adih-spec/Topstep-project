<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;




Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::controller(StudentController::class)->group(function()  {
        Route::get('/students', 'index')->name('students.index'); 
        Route::get('/students/register', 'create')->name('students.create'); 
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
     });
});