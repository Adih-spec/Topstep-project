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
   Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('admission_number')->unique()->nullable();
    $table->string('first_name');
    $table->string('middle_name')->nullable();
    $table->string('last_name');
    $table->string('email')->unique();
    $table->string('password'); // 👈 needed for login
    $table->string('phone')->nullable();
    $table->date('dob')->nullable();
    $table->enum('gender', ['male', 'female'])->nullable();
    $table->string('country')->nullable();
    $table->string('state_of_origin')->nullable();
    $table->string('religion')->nullable(); // 👈 add religion
    $table->text('address')->nullable();
    $table->string('class')->nullable();
    $table->string('guardian_phone')->nullable();
    $table->date('enrollment_date')->nullable();
    $table->date('admission_date')->nullable(); // 👈 add admission_date
    $table->string('photo')->nullable(); // 👈 add photo
    $table->enum('status', ['active', 'suspended', 'graduated'])->default('active');
    $table->softDeletes();
    $table->timestamps();
});



}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
