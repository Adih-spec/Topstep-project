<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees_attendances', function (Blueprint $table) {
            $table->id('AttendanceID');
            $table->unsignedBigInteger('EmployeeID');
            $table->date('AttendanceDate');
            $table->time('CheckIn')->nullable();
            $table->time('CheckOut')->nullable();
            $table->decimal('WorkDurationHours', 5, 2)->nullable();
            $table->enum('Status', ['present','absent','on_leave','late'])->default('absent');
            $table->timestamps();
        
            $table->foreign('EmployeeID')
                  ->references('EmployeeID')->on('employees')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_attendances');
    }
};
