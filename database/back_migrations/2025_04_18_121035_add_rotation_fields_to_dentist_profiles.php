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
        Schema::table('dentist_profiles', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false)->after('landing_page_customized');
            $table->integer('priority')->default(0)->after('is_featured');
            $table->index(['status', 'package_id']); // Add composite index
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dentist_profiles', function (Blueprint $table) {
            $table->dropColumn(['is_featured', 'priority']);
            $table->dropIndex(['status', 'package_id']);
        });
    }
};
