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
    Schema::table('cities', function (Blueprint $table) {
        $table->index('slug');
    });

    Schema::table('dental_services', function (Blueprint $table) {
        $table->index('slug');
    });

    Schema::table('dentist_services', function (Blueprint $table) {
        $table->index(['service_id', 'dentist_profile_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropIndex(['slug']);
        });

        Schema::table('dental_services', function (Blueprint $table) {
            $table->dropIndex(['slug']);
        });

        Schema::table('dentist_services', function (Blueprint $table) {
            $table->dropIndex(['service_id', 'dentist_profile_id']);
        });
    }
};
