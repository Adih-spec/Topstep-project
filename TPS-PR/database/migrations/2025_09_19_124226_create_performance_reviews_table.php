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
        Schema::create('performance_reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->unsignedBigInteger('EmployeeID');
            $table->string('CycleName', 100); // e.g. “2024 Term 2 Review”
            $table->date('ReviewDate');
            $table->unsignedBigInteger('ReviewerID')->nullable();
            $table->decimal('OverallScore', 5, 2)->nullable();
            $table->text('Summary')->nullable();
            $table->timestamps();
        
            $table->foreign('EmployeeID')
                  ->references('EmployeeID')->on('employees')
                  ->onDelete('cascade');
        
            $table->foreign('ReviewerID')
                  ->references('EmployeeID')->on('employees')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_reviews');
    }
};
