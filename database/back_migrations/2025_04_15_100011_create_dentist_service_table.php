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
        Schema::create('dentist_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->references('id')->on('dentist_profiles')->onDelete('cascade');
            $table->foreignId('service_id')->references('id')->on('dental_services')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_service');
    }
};
