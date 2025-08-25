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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('instructor');
            $table->text('description')->nullable();
            $table->text('topics')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('views')->nullable();
            $table->integer('time')->nullable(); // Changed to integer
            $table->string('category');
            $table->string('level');
            $table->integer('duration')->nullable(); // Changed to integer
            $table->integer('lessons')->nullable();
            $table->integer('price')->nullable(); // Changed to integer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};