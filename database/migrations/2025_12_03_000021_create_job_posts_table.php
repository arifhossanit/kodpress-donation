<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('job_departments')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable(); // Full-time, Part-time, Contract
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('deadline')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
