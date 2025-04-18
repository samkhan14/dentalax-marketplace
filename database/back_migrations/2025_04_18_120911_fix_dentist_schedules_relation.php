<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('dentist_profiles', function (Blueprint $table) {
        $table->dropForeign(['dentist_schedule_id']);
        $table->dropColumn('dentist_schedule_id');
    });

    Schema::table('dentist_schedules', function (Blueprint $table) {
        $table->foreignId('dentist_profile_id')->constrained()->onDelete('cascade')->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('dentist_schedules', function (Blueprint $table) {
        $table->dropForeign(['dentist_profile_id']);
    });

    Schema::table('dentist_profiles', function (Blueprint $table) {
        $table->foreignId('dentist_schedule_id')->constrained('dentist_schedules')->onDelete('cascade');
    });
}
};
