<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('report_card_configurations', function (Blueprint $table) {
            $table->id('report_config_id');

            // General Config Info
            $table->string('title')->unique()->comment('Configuration title/name');
            $table->text('description')->nullable()->comment('Brief description');

            // Student Info
            $table->json('student_info_fields')->nullable()->comment('["Name","Class","Admission No","DOB","Gender"]');

            // Academic Settings
            $table->json('grading_scale')->nullable()->comment('{ "A": "90-100", "B": "80-89" }');
            $table->json('weights')->nullable()->comment('{ "ca":0.4,"exam":0.6 }');
            $table->boolean('show_total_marks')->default(true);
            $table->boolean('show_mean_marks')->default(true);
            $table->boolean('show_position_in_class')->default(true);
            $table->boolean('show_subject_averages')->default(true);
            $table->boolean('show_student_rank')->default(true);
            $table->boolean('show_gpa')->default(false)->comment('Show GPA or CGPA');
            $table->boolean('show_promotion_status')->default(true)->comment('Show promoted/repeated');

            // Attendance
            $table->boolean('show_attendance')->default(true);
            $table->boolean('show_days_present')->default(true);
            $table->boolean('show_days_absent')->default(true);
            $table->boolean('show_days_late')->default(false);

            // Domains
            $table->boolean('show_cognitive_domain')->default(true);
            $table->json('cognitive_domain')->nullable()->comment('["Knowledge","Comprehension","Application"]');

            $table->boolean('show_affective_domain')->default(true);
            $table->json('affective_domain')->nullable()->comment('["Attitude","Teamwork","Discipline"]');

            $table->boolean('show_psycomotor_domain')->default(true);
            $table->json('psycomotor_domain')->nullable()->comment('["Drawing","Games","Sports","Music"]');

            $table->boolean('show_behavior_fields')->default(true);
            $table->json('behavior_fields')->nullable()->comment('["Neatness","Punctuality","Respect"]');

            // Comments Sections
            $table->boolean('show_teachers_comments')->default(true);
            $table->boolean('show_headteachers_comments')->default(true);
            $table->boolean('show_principals_comments')->default(true);
            $table->boolean('show_general_remarks')->default(true);

            // Term & School Info
            $table->boolean('show_next_term_begins')->default(true);
            $table->boolean('show_holidays')->default(true);
            $table->boolean('show_term_summary')->default(true)->comment('Summary of student performance');

            // Branding & School Identity
            $table->boolean('show_school_motto')->default(true);
            $table->boolean('show_school_address')->default(true);
            $table->boolean('show_school_contact')->default(true);
            $table->boolean('show_school_website')->default(true);
            $table->boolean('show_school_email')->default(true);
            $table->string('logo_url', 255)->nullable()->comment('School logo path');
            $table->string('stamp_url', 255)->nullable()->comment('Stamp image path');
            $table->string('signature_url', 255)->nullable()->comment('Signature image path');

            // Template Style
            $table->enum('template_style', ['modern', 'classic'])->default('modern');
            $table->string('guard')->nullable()->comment('e.g., "Topstep" or "SchoolAdmin"');

            // Visualization
            $table->boolean('show_charts')->default(true)->comment('Show performance charts');
            $table->boolean('show_progress_summary')->default(true)->comment('Compare 1st/2nd/3rd term progress');

            // Meta
            $table->unsignedBigInteger('created_by')->comment('References users.id');
            $table->timestamps();

            // Foreign key
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_card_configurations');
    }
};
