<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Nursery 1"
            $table->string('category')->nullable(); // e.g., "Nursery", "Primary"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('levels');
    }
}