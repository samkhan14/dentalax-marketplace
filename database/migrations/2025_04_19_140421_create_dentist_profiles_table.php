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
        Schema::create('dentist_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->string('foundation_experience');
            $table->json('expertise_areas')->nullable();
            $table->string('practice_name');
            $table->text('practice_description');
            $table->string('permanent_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone', 20);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', ['active', 'claimed', 'unclaimed', 'inactive'])->default('unclaimed');
            $table->boolean('landing_page_customized')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->integer('priority')->default(0);
            $table->timestamps();

            // Add relationship to schedules after schedules table exists
            $table->foreignId('dentist_schedule_id')->nullable()->constrained('dentist_schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_profiles');
    }
};
