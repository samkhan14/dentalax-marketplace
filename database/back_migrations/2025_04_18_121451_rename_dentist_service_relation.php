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
    Schema::table('dentist_service', function (Blueprint $table) {
        $table->dropForeign(['service_id']);
    });

    Schema::rename('dentist_service', 'dentist_services');

    Schema::table('dentist_services', function (Blueprint $table) {
        $table->foreign('service_id')->references('id')->on('dental_services')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('dentist_services', function (Blueprint $table) {
        $table->dropForeign(['service_id']);
    });

    Schema::rename('dentist_services', 'dentist_service');

    Schema::table('dentist_service', function (Blueprint $table) {
        $table->foreign('service_id')->references('id')->on('detail_services')->onDelete('cascade');
    });
}
};
