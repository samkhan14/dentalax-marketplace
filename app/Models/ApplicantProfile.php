<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantProfile extends Model
{
    use SoftDeletes;
    protected $table = 'applicant_profiles';

    protected $fillable = [
        'user_id',
        'phone',
        'city_id',
        'resume_path',
        'experience',
        'created_at',
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

    public function activityLogs()
    {
        return $this->morphMany(\App\Models\ActivityLog::class, 'loggable');
    }



}
