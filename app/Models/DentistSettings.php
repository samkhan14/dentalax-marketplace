<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentistSettings extends Model
{
    protected $fillable = [
        'dentist_profile_id',
        'booking_method',
        'default_duration',
        'min_lead_time',
        'bookable_services',
        'send_confirmation',
        'send_reminders',
        'reminder_hours'
    ];

    protected $casts = [
        'bookable_services' => 'array',
        'send_confirmation' => 'boolean',
        'send_reminders' => 'boolean'
    ];

    // Relationships
    public function dentistProfile()
    {
        return $this->belongsTo(DentistProfile::class);
    }

    // Scopes
    public function scopeIntegratedBooking($query)
    {
        return $query->where('booking_method', 'integrated');
    }
}
