<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_card_configurations', function (Blueprint $table) {
            $table->id('config_id'); // Primary key: Unique configuration ID
            $table->json('grading_scale')->comment('e.g., { "A": "90-100", "B": "80-89" }');
            $table->json('weights')->comment('e.g., { "exam":0.6,"test":0.3,"assignment":0.1 }');
            $table->boolean('show_attendance')->default(true)->comment('Show attendance on cards');
            $table->boolean('show_comments')->default(true)->comment('Include teacher comments');
            $table->json('behavior_fields')->nullable()->comment('e.g., ["Neatness","Punctuality"]');
            $table->string('template_style', 50)->default('modern')->comment('e.g., modern, classic');
            $table->string('logo_url', 255)->nullable()->comment('Path to school logo');
            $table->unsignedBigInteger('created_by')->comment('References users.user_id');
            $table->timestamps(); // Adds created_at and updated_at

            // Foreign key linking created_by to users.user_id
            $table->foreign('created_by')->references('id')->on('users');
                $table->foreign('created_by')->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_card_configurations');
    }
};

