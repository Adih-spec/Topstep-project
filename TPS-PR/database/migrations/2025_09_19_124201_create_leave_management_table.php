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
        Schema::create('leave_management', function (Blueprint $table) {
            $table->id('LeaveID');
            $table->unsignedBigInteger('EmployeeID');
            $table->enum('leave_type', ['sick', 'casual', 'annual', 'maternity', 'study', 'other']);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->decimal('DurationDays', 6, 2);
            $table->enum('Status', ['pending','approved','rejected','cancelled'])->default('pending');
            $table->text('Reason')->nullable();
            $table->unsignedBigInteger('ApprovedBy')->nullable();
            $table->timestamps();
        
            $table->foreign('EmployeeID')
                  ->references('EmployeeID')->on('employees')
                  ->onDelete('cascade');
        
            $table->foreign('ApprovedBy')
                  ->references('EmployeeID')->on('employees')
                  ->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_management');
    }
};
