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
        Schema::create('dentist_landing_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_profile_id')->constrained()->onDelete('cascade');
            $table->string('color_scheme')->default('#3fbfd8');
            $table->string('template')->default('classic');
            $table->string('header_style')->default('minimalist');
            $table->string('header_image')->nullable();
            $table->string('header_main_heading')->nullable();
            $table->string('header_sub_heading')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('about_us_headline')->nullable();
            $table->string('about_us_subheading')->nullable();
            $table->longText('about_us_description')->nullable();
            $table->string('about_us_image')->nullable();
            $table->json('service_categories')->nullable();
            $table->boolean('show_contact_details')->default(true);
            $table->boolean('show_reviews')->default(true);
            $table->boolean('show_map')->default(true);
            $table->boolean('show_opening_hours')->default(true);
            $table->boolean('show_team_section')->default(true);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('seo_slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_landing_pages');
    }
};
