<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DentistProfile extends Model
{
    use SoftDeletes;
    protected $table = 'dentist_profiles';

    protected $fillable = [
        'user_id',
        'first_name',
        'city_id',
        'plan_id',
        'foundation_experience',
        'expertise_areas',
        'practice_name',
        'practice_description',
        'permanent_address',
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
        return $this->hasMany(DentistSchedule::class);
    }

}
