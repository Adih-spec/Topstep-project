<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('class_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., 'Nursery', 'Basic 1'
            $table->string('section'); // e.g., 'Nursery', 'Primary'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_levels');
    }
};