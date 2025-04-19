<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewer_id')->nullable()->constrained('users')->onDelete('set null');
            $table->morphs('reviewable');
            $table->tinyInteger('rating')->default(5);
            $table->text('comment')->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->string('review_type')->nullable();
            $table->json('tags')->nullable();  // ["friendly staff", "pain-free"]
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
