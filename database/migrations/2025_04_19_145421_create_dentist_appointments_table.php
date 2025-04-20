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
        Schema::create('dentist_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->constrained();
            $table->foreignId('service_id')->nullable()->constrained('dental_services');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_appointments');
    }
};
