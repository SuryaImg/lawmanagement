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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('p_r_name')->nullable();
            $table->string('p_r_advocate')->nullable();
            $table->string('title')->nullable();            
            $table->foreignId('case_category_id')->nullable()->constrained('case_categories')->onDelete('set null');
            $table->foreignId('court_category_id')->nullable()->constrained('court_categories')->onDelete('set null');
            $table->foreignId('stage_id')->nullable()->constrained('case_stages')->onDelete('set null');
            $table->foreignId('court_id')->nullable()->constrained('courts')->onDelete('set null');
            $table->foreignId('staff_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('case_no')->nullable();
            $table->string('opp_lawyer')->nullable();
            $table->string('case_file_no')->nullable();
            $table->text('acts')->nullable();
            $table->text('case_charge')->nullable();
            $table->date('receiving_date')->nullable();
            $table->date('filling_date')->nullable();
            $table->date('hearing_date')->nullable();
            $table->date('judgement_date')->nullable();
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
