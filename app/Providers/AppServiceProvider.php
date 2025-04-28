<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DentistProfile;
use App\Models\User;
use App\Models\PatientProfile;
use App\Models\ApplicantProfile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DentistProfile::observe(\App\Observers\DentistProfileObserver::class);
        // User::observe(\App\Observers\UserObserver::class);
        PatientProfile::observe(\App\Observers\PatientProfileObserver::class);
        ApplicantProfile::observe(\App\Observers\ApplicantProfileObserver::class);
    }
}
