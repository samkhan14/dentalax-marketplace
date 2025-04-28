<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DentistLandingPage extends Model
{
    use SoftDeletes;

    protected $table = 'dentist_landing_pages';

    protected $fillable = [
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
