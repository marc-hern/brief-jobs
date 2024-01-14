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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_id');           // 1234567, 31bhfd673b
            $table->string('title');            // Senior PHP Software Engineer
            $table->string('company');          // Company, Inc.
            $table->string('language');         // PHP
            $table->string('redirect_url');     // https://blah.com/...
            $table->string('location');         // Remote, Hybrid, On-Site (...)
            $table->date('posted_date');        // 01-05-2024
            $table->timestamps();               // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
