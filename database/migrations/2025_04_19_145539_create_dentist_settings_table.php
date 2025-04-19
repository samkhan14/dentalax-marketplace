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
        Schema::create('dentist_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->constrained()->unique();
            $table->enum('booking_method', ['integrated', 'external', 'inquiry'])->default('integrated');
            $table->integer('default_duration')->default(30); // minutes
            $table->integer('min_lead_time')->default(1); // days
            $table->json('bookable_services')->nullable(); // Which services can be booked online
            $table->boolean('send_confirmation')->default(true);
            $table->boolean('send_reminders')->default(true);
            $table->integer('reminder_hours')->default(24);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_settings');
    }
};
