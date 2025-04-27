<?php

use App\Http\Controllers\ApplicantProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\DentistDashboardController;
use App\Http\Controllers\DentistProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';


// ----------------------// ✅ FRONTEND ROUTES// ----------------------

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.page');
    Route::get('/fuer-zahnaerzte', 'forDentists')->name('for_dentists');
    Route::get('/paketwahl', 'Packages')->name('packages');
    Route::get('/stellenangebote', 'jobOffers')->name('job_offers');
    Route::get('/stellenangebot/zfa-berlin', 'jobDetails')->name('job_details');
    Route::get('/ratgeber', 'Counselor')->name('counselor');
    Route::get('/kontakt', 'Contact')->name('contact');
    Route::get('/ueber-uns', 'aboutUs')->name('about_us');
    Route::get('/registrieren', 'mainRegistrationPage')->name('main.registration.page');
    Route::get('/passwort-vergessen', 'passwordForget')->name('password.forget.for.both');

    // Dynamic City & Dentist Routes
    Route::get('/zahnaerzte-nach-staedten', 'allCities')->name('all_cities');
    Route::get('/zahnarzt-in/{city:slug}', 'dentistCityDetailPage')->name('city.doctor.details');
});


// ✅ UNIVERSAL LOGIN + LOGOUT ROUTES (Centralized)
Route::post('/login', [UserController::class, 'userLogin'])->name('user.login');
Route::post('/logout', [UserController::class, 'userLogout'])->name('user.logout');


// ---------------------- // ✅ PATIENT ROUTES (Updated with middleware) // ----------------------
Route::prefix('/patienten')->name('patient.')->group(function () {
    // Public routes (no auth)
    Route::controller(PatientProfileController::class)->group(function () {
        Route::get('/registrieren', 'patientRegistrationPage')->name('registration.page');
        Route::post('/registrieren', 'patientRegistrationStore')->name('registration.store');
        Route::get('/login', 'patientLoginPage')->name('login.page');
    });

    // Protected routes (require auth and patient role)
    Route::middleware(['auth', CheckRole::class . ':patient'])->group(function () {
        Route::controller(PatientProfileController::class)->group(function () {
            Route::get('/dashboard', 'Dashboard')->name('dashboard');
        });
    });
});


// ---------------------- // ✅ Applicant ROUTES (Updated with middleware) // ----------------------
Route::prefix('/antragsteller')->name('applicant.')->group(function () {
    // Public routes (no auth)
    Route::controller(ApplicantProfileController::class)->group(function () {
        Route::get('/registrieren', 'applicantRegistrationPage')->name('registration.page');
        Route::post('/registrieren', 'applicantRegistrationStore')->name('registration.store');
        Route::get('/login', 'applicantLoginPage')->name('login.page');
    });

    // Protected routes (require auth and patient role)

    Route::middleware(['auth', CheckRole::class . ':applicant'])->group(function () {
        Route::controller(ApplicantProfileController::class)->group(function () {
            Route::get('/dashboard', 'Dashboard')->name('dashboard');
        });
    });
});


// ---------------------- // ✅ DENTIST ROUTES (Updated with middleware) // ----------------------
Route::prefix('zahnarzt')->name('dentist.')->group(function () {
    // Public routes (no auth)
    Route::controller(DentistProfileController::class)->group(function () {
        Route::get('/registrieren', 'dentistRegistrationPage')->name('registration.page');
        Route::post('/registrieren', 'dentistRegistrationStore')->name('registration.store');
        Route::get('/login', 'dentistLoginPage')->name('login.page');
        Route::get('/zahnarztpraxis-dr-mueller', 'landingPageForDentist')->name('landingpage');
    });

    // Protected routes (require auth and dentist role)
    Route::middleware(['auth', CheckRole::class . ':dentist'])->group(function () {
        Route::controller(DentistProfileController::class)->group(function () {
            Route::get('/dashboard', 'Dashboard')->name('dashboard');
        });
    });
});

// ✅ UNIVERSAL GET /login REDIRECT (if someone hits /login directly)
Route::get('/login', function () {
    if (auth()->check()) {
        $role = auth()->user()->getRoleNames()->first();
        return match ($role) {
            'patient' => redirect()->route('patient.dashboard'),
            'dentist' => redirect()->route('dentist.dashboard'),
            'applicant' => redirect()->route('applicant.dashboard'),
            default => redirect()->route('home.page'),
        };
    }
    return redirect()->route('home.page');
})->name('login');

// ✅ GLOBAL FALLBACK ROUTE
Route::fallback(function () {
    return redirect()->route('home.page');
});


// ---------------------- // ✅ SAMPLE DEMO ROUTE (No changes) // ----------------------
Route::get('/sample-dashboard', function () {
    return view('frontend.pages.dashboards.dashboard_page');
})->name('sample.dashboard');

