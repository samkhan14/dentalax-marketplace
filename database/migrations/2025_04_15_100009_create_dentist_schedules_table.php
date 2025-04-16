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
        Schema::create('dentist_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->references('id')->on('dentist_profiles')->onDelete('cascade');
            $table->string('from_day');
            $table->string('to_day');
            $table->string('opening_time');
            $table->string('closing_time');
            $table->string('clinic_area');
            $table->string('clinic_name');
            $table->string('clinic_map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_schedules');
    }
};
