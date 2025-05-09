<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DentistSchedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'day',
        'opening_time',
        'closing_time',
        'is_closed',
        'clinic_area',
        'clinic_name',
        'clinic_map'
    ];

    protected $casts = [
        'is_closed' => 'boolean',
        'opening_time' => 'datetime:H:i',
        'closing_time' => 'datetime:H:i'
    ];

    public function dentist()
    {
        return $this->belongsTo(DentistProfile::class);
    }

    // Scopes
    public function scopeWorkingDays($query)
    {
        return $query->where('is_closed', false);
    }

    public function scopeForDay($query, $day)
    {
        return $query->where('day', strtolower($day));
    }
}
