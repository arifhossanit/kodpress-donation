<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('page_sections')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->longText('content')->nullable();
            $table->json('settings')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_blocks');
    }
};
