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
        Schema::create('dentist_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('dentist_schedule_id')->references('id')->on('dentist_schedules')->onDelete('cascade');
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('plan_id')->references('id')->on('packages')->onDelete('cascade');
            $table->string('foundation_experience');
            $table->string('practice_name');
            $table->text('practice_description');
            $table->string('permanent_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', ['active', 'claimed', 'unclaimed', 'inactive'])->default('unclaimed');
            $table->boolean('landing_page_customized')->default(false);
            $table->timestamps();
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
