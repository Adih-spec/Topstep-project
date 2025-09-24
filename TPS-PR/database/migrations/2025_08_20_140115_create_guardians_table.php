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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('religion')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('country')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('city')->nullable();
            $table->string('occupation')->nullable();
            $table->string('password')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
