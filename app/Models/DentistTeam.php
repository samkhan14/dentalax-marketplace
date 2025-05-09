<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DentistTeam extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'dentist_profile_id',
        'team_name',
        'team_position',
        'team_description',
        'team_image',
        'specializations'
    ];

    protected $casts = [
        'specializations' => 'array',
        'deleted_at' => 'datetime'
    ];

    // Relationships
    public function dentistProfile()
    {
        return $this->belongsTo(DentistProfile::class);
    }
}
