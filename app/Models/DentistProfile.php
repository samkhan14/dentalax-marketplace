<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DentistProfile extends Model
{
    use SoftDeletes;
    protected $table = 'dentist_profiles';

    protected $fillable = [
        'user_id',
        'city_id',
        'plan_id',
        'foundation_experience',
        'expertise_areas',
        'practice_name',
        'practice_description',
        'permanent_address',
        'postal_code',
        'phone',
        'latitude',
        'longitude',
        'website',
        'logo',
        'status',
        'landing_page_customized',
        'is_featured',
        'priority',
        'dentist_schedule_id ',
        'deleted_at'
    ];

    protected $casts = [
        'landing_page_customized' => 'boolean',
        'is_featured' => 'boolean',
        'priority' => 'integer',
        'deleted_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function dentistSchedule()
    {
        return $this->belongsTo(DentistSchedule::class);
    }

    public function activityLogs(): MorphMany
    {
        return $this->morphMany(\App\Models\ActivityLog::class, 'loggable');
    }

    public function landingPage()
    {
        return $this->hasOne(DentistLandingPage::class);
    }

    public function settings()
    {
        return $this->hasOne(DentistSettings::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(DentistTeam::class);
    }
    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByPriority($query)
    {
        return $query->orderBy('priority', 'desc');
    }

}
