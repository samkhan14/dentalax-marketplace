<?php

namespace App\Observers;

use App\Services\ActivityLogService;

class PatientProfileObserver
{
    public function created($patientProfile)
    {
         ActivityLogService::log($patientProfile->user_id, $patientProfile, 'create', 'Patient Profile created.');
    }

    public function updated($patientProfile)
    {
         ActivityLogService::log($patientProfile->user_id, $patientProfile, 'update', 'Patient Profile updated.');
    }

    public function deleted($patientProfile)
    {
         ActivityLogService::log($patientProfile->user_id, $patientProfile, 'delete', 'Patient Profile deleted.');
    }

}
