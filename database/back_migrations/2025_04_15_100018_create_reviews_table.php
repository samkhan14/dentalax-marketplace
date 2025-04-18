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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewer_id')->references('id')->on('users')->onDelete('cascade');
            $table->morphs('reviewable'); // dentist or patient
            $table->tinyInteger('rating')->default(5);
            $table->text('comment')->nullable();
            $table->enum('status', ['published', 'hidden'])->default('published');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
