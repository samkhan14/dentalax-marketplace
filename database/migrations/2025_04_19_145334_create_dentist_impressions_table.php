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
        Schema::create('dentist_impressions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->constrained()->cascadeOnDelete();
            $table->string('ip_address')->nullable();
            $table->string('session_id')->nullable();
            $table->string('search_query')->nullable();
            $table->string('source')->default('organic');
            $table->timestamp('viewed_at')->useCurrent();

            $table->index(['dentist_profile_id', 'viewed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_impressions');
    }
};
