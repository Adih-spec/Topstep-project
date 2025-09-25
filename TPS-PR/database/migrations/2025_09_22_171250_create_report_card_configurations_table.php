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
            $table->id('report_config_id'); // Primary key: Unique configuration ID
            $table->string('title')->unique()->comment('Configuration title/name');
            $table->text('description')->nullable()->comment('Brief description of the configuration');
            $table->json('student_info_fields')->nullable()->comment('e.g., ["Name","Class","Roll Number"]');
            $table->json('grading_scale')->comment('e.g., { "A": "90-100", "B": "80-89" }');
            $table->json('weights')->comment('e.g., { "exam":0.6,"test":0.3,"assignment":0.1 }');
            $table->boolean('show_attendance')->default(true)->comment('Show attendance on cards');
            $table->boolean('show_teachers_comments')->default(true)->comment('Include teacher comments');
            $table->boolean('show_headteachers_comments')->default(true)->comment('Include head teacher comments');
            $table->boolean('show_principals_comments')->default(true)->comment('Include principal[s comments');
            $table->boolean('show_next_term_begins')->default(true)->comment('Show next term start date');
            $table->boolean('show_holidays')->default(true)->comment('Show holidays section');
            $table->boolean('show_school_motto')->default(true)->comment('Display school motto');
            $table->boolean('show_school_address')->default(true)->comment('Display school address');
            $table->boolean('show_school_contact')->default(true)->comment('Display school contact info');
            $table->boolean('show_school_website')->default(true)->comment('Display school website');
            $table->boolean('show_school_email')->default(true)->comment('Display school email');
            $table->boolean('show_subject_teacher')->default(true)->comment('Display subject teacher names');
            $table->boolean('show_subject_averages')->default(true)->comment('Display subject averages');
            $table->boolean('show_student_rank')->default(true)->comment('Display student ranking');
            $table->boolean('show_total_marks')->default(true)->comment('Display total marks');
            $table->boolean('show_mean_marks')->default(true)->comment('Display mean marks');
            $table->boolean('show_position_in_class')->default(true)->comment('Display position in class');
            $table->boolean('show_cognitive_domain')->default(true)->comment('Show cognitive domain');
            $table->boolean('show_behavior_fields')->default(true)->comment('Show behavior fields');
            $table->boolean('show_affective_domain')->default(true)->comment('Show affective domain');
            $table->boolean('show_psycomotor_domain')->default(true)->comment('Show psycomotor domain');
            $table->json('cognitive_domain')->nullable()->comment('e.g., ["Knowledge","Comprehension"]');
            $table->json('behavior_fields')->nullable()->comment('e.g., ["Neatness","Punctuality"]');
            $table->json('affective_domain')->nullable()->comment('e.g., ["Attitude","Teamwork"]');
            $table->json('psycomotor_domain')->nullable()->comment('e.g., ["Neatness","Punctuality"]');
            $table->enum('template_style', ['modern', 'classic'])->default('modern')->comment('e.g., modern, classic');
            $table->string('logo_url', 255)->nullable()->comment('Path to school logo');
            $table->string('guard')->nullable()->comment('E.g., "Topstep" or "SchoolAdmin"');
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

