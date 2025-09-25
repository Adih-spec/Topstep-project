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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('EmployeeID');
            $table->unsignedBigInteger('DepartmentID')->nullable();
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->string('Email', 100)->unique();
            $table->string('PhoneNumber', 20)->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->enum('Gender', ['Male', 'Female'])->nullable();
            $table->enum('Role', ['teacher', 'non-teacher']);
            $table->string('JobTitle', 100)->nullable();
            $table->date('HireDate')->nullable();
            $table->enum('Status', ['Active', 'Inactive', 'On Leave', 'Terminated'])->default('Active');
            $table->text('Address')->nullable();
            $table->string('City', 100)->nullable();
            $table->string('State', 100)->nullable();
            $table->string('Country', 100)->nullable();
            $table->string('EmergencyContact', 100)->nullable();
            $table->string('ProfilePicture')->nullable();
            $table->string('EmployeeNumber', 30)->nullable();
            $table->string('password');
            $table->timestamp('LastLogin')->nullable();
            $table->timestamps();
        
            $table->foreign('DepartmentID')
                  ->references('DepartmentID')->on('departments')
                  ->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
