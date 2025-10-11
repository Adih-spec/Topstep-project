<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('class_level_stream', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_level_id')->constrained()->cascadeOnDelete();
            $table->foreignId('stream_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_level_stream');
    }
};