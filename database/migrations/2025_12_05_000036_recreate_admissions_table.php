<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop old admissions table and recreate with new fields
        Schema::dropIfExists('admissions');
        
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            
            // Personal Information
            $table->string('name');
            $table->string('gender')->nullable(); // Male, Female
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('identification_document_no')->nullable();
            $table->date('identification_expiry_date')->nullable();
            
            // Educational Background
            $table->string('education_level')->nullable();
            $table->text('other_qualifications')->nullable();
            
            // Employment Status
            $table->string('employment_status')->nullable();
            $table->text('professional_training')->nullable();
            $table->boolean('attended_training_courses')->default(false);
            
            // Desired Course
            $table->string('desired_course')->nullable();
            
            // Consent & Agreements
            $table->boolean('training_regulations_accepted')->default(false);
            $table->boolean('personal_data_disclosure_authorized')->default(false);
            
            // Admin fields
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending, accepted, rejected
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admissions');
    }
};
