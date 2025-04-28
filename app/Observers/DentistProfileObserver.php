<?php

namespace App\Observers;

use App\Models\DentistProfile;
use App\Services\ActivityLogService;

class DentistProfileObserver
{
    public function created(DentistProfile $dentistProfile)
    {
        ActivityLogService::log($dentistProfile->user_id, $dentistProfile, 'create', 'Dentist Profile created.');
    }

    public function updated(DentistProfile $dentistProfile)
    {
        ActivityLogService::log($dentistProfile->user_id, $dentistProfile, 'update', 'Dentist Profile updated.');
    }

    public function deleted(DentistProfile $dentistProfile)
    {
        ActivityLogService::log($dentistProfile->user_id, $dentistProfile, 'delete', 'Dentist Profile deleted.');
    }
}
