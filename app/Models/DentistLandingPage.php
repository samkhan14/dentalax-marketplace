<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DentistLandingPage extends Model
{
    use SoftDeletes;

    protected $table = 'dentist_landing_pages';

    protected $fillable = [
        'dentist_profile_id',
        'color_scheme',
        'template',
        'header_style',
        'header_image',
        'header_main_heading',
        'header_sub_heading',
        'button_text',
        'button_link',
        'about_us_headline',
        'about_us_subheading',
        'about_us_description',
        'about_us_image',
        'service_categories',
        'show_contact_details',
        'show_reviews',
        'show_map',
        'show_opening_hours',
        'show_team_section',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_slug'
    ];

    protected $casts = [
        'service_categories' => 'array',
        'show_contact_details' => 'boolean',
        'show_reviews' => 'boolean',
        'show_map' => 'boolean',
        'show_opening_hours' => 'boolean',
        'show_team_section' => 'boolean',
        'deleted_at' => 'datetime'
    ];

    public function dentistProfile()
    {
        return $this->belongsTo(DentistProfile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
