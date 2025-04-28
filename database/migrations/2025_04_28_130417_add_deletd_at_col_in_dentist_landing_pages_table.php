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
        Schema::table('dentist_landing_pages', function (Blueprint $table) {
            $table->softDeletes()->after('seo_slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dentist_landing_pages', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
