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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');

            // Basic Info
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string("marital_status")->nullable();
            $table->string('avatar')->nullable();

            // Identification
            $table->enum('id_type', [
                'staff_id',
                'national_id',
                'passport',
                'drivers_license',
                'voters_card'
            ])->nullable();
            $table->string('id_number')->nullable();   // e.g. NIN, Passport No
            $table->string('id_document')->nullable(); // file path to uploaded ID scan/photo

            // Role & Permissions
            // $table->enum('role', [
            //     'super_admin',
            //     'principal',
            //     'vice_principal',
            //     'exam_officer',
            //     'finance_officer',
            //     'staff_admin'
            // ])->default('staff_admin');

            // Security & Authentication
            $table->boolean('status')->default(true); 
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->text('user_agent')->nullable();   // device/browser info
            $table->string('two_factor_secret')->nullable();
            $table->string('two_factor_recovery_codes')->nullable();
            $table->rememberToken();
            
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
