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
        Schema::create('dentist_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->constrained()->onDelete('cascade');
            $table->string('team_name');
            $table->string('team_position');
            $table->string('team_description')->nullable();
            $table->string('team_image')->nullable();
            $table->json('specializations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_teams');
    }
};
