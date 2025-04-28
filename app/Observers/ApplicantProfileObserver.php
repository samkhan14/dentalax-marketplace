<?php

namespace App\Observers;

class ApplicantProfileObserver
{
    public function created($applicantProfile)
    {
        // 👇 Skip kare agar model me skipObserver property set hai
            if (!empty($applicantProfile->skipObserver)) {
                return;
            }
        // Log the creation of the applicant profile
        \App\Services\ActivityLogService::log(
            $applicantProfile->user_id,
            $applicantProfile,
            'create',
            'Applicant Profile created.'
        );
    }

    public function updated($applicantProfile)
    {
          // 👇 Skip kare agar model me skipObserver property set hai
          if (!empty($applicantProfile->skipObserver)) {
            return;
        }
        // Log the update of the applicant profile
        \App\Services\ActivityLogService::log(
            $applicantProfile->user_id,
            $applicantProfile,
            'update',
            'Applicant Profile updated.'
        );
    }

    public function deleted($applicantProfile)
    {
          // 👇 Skip kare agar model me skipObserver property set hai
          if (!empty($applicantProfile->skipObserver)) {
            return;
        }
        // Log the deletion of the applicant profile
        \App\Services\ActivityLogService::log(
            $applicantProfile->user_id,
            $applicantProfile,
            'delete',
            'Applicant Profile deleted.'
        );
    }
}
