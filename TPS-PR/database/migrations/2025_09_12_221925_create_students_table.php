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
    $table->string('admission_number')->unique();
    $table->string('first_name');
    $table->string('middle_name')->nullable();
    $table->string('last_name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->date('dob')->nullable();
    $table->enum('gender', ['male', 'female', 'other'])->nullable();
    $table->string('class')->nullable();
    $table->string('country')->nullable();
    $table->string('state_of_origin')->nullable();
    $table->string('religion')->nullable();
    $table->string('address')->nullable();
    $table->date('admission_date')->nullable();
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->string('photo')->nullable();
    $table->string('password'); 
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
