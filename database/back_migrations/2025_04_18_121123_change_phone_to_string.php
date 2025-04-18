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
            $table->string('phone', 20)->change();
        });

        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->string('phone', 20)->change();
        });

        Schema::table('applicant_profiles', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('dentist_profiles', function (Blueprint $table) {
        $table->integer('phone')->change();
    });

    Schema::table('patient_profiles', function (Blueprint $table) {
        $table->integer('phone')->change();
    });

    Schema::table('applicant_profiles', function (Blueprint $table) {
        $table->integer('phone')->nullable()->change();
    });
}
};
