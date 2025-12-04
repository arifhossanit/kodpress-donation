<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_post_id')->constrained('job_posts')->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('applicant_email');
            $table->string('applicant_phone')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('resume_path')->nullable();
            $table->string('status')->default('pending'); // pending, reviewing, accepted, rejected
            $table->text('notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
};
