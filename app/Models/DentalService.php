<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentalService extends Model
{
    protected $table = 'dental_services';

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description'
    ];

    // Relationships
    public function dentists()
    {
        return $this->belongsToMany(DentistProfile::class, 'dentist_services')
            ->withTimestamps();
    }

    // Scopes
    public function scopePopular($query)
    {
        return $query->whereIn('name', [
            'Zahnreinigung / Prophylaxe',
            'Kontrolluntersuchung',
            'Füllungstherapie'
        ]);
    }
}
