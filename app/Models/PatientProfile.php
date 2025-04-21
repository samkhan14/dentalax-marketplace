<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    protected $table = 'patient_profiles';

    protected $fillable = [
        'user_id',
        'dob',
        'phone',
        'gender',
        'address',
        'city',
        'postal_code',
        'patient_history',
        'any_reference',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
