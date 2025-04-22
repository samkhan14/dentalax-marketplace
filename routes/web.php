<?php

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


// ----------------------
// ✅ FRONTEND ROUTES
// ----------------------

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


// ----------------------
// ✅ PATIENT ROUTES (Updated with middleware)
// ----------------------
Route::prefix('/patienten')->name('patient.')->group(function () {
    // Public routes (no auth)
    Route::controller(PatientProfileController::class)->group(function () {
        Route::get('/registrieren', 'patientRegistrationPage')->name('registration.page');
        Route::post('/registrieren', 'patientRegistrationStore')->name('registration.store');
        Route::get('/login', 'patientLoginPage')->name('login.page');
        Route::post('/login-in', 'patientLogin')->name('login.in');
    });

    // Protected routes (require auth and patient role)
    Route::middleware(['auth', CheckRole::class . ':patient'])->group(function () {
        Route::controller(PatientProfileController::class)->group(function () {
            Route::get('/dashboard', 'Dashboard')->name('dashboard');
            Route::post('/logout', 'logout')->name('logout');
        });
    });
});


// ----------------------
// ✅ DENTIST ROUTES (Updated with middleware)
// ----------------------
Route::prefix('zahnarzt')->name('dentist.')->group(function () {
    // Public routes (no auth)
    Route::controller(DentistProfileController::class)->group(function () {
        Route::get('/registrieren', 'dentistRegistrationPage')->name('registration.page');
        Route::post('/registrieren', 'dentistRegistrationStore')->name('registration.store');
        Route::get('/login', 'dentistLoginPage')->name('login.page');
        Route::post('/login', 'dentistLogin')->name('login');
        Route::get('/zahnarztpraxis-dr-mueller', 'landingPageForDentist')->name('landingpage');
    });

    // Protected routes (require auth and dentist role)
    Route::middleware(['auth', CheckRole::class . ':dentist'])->group(function () {
        Route::controller(DentistProfileController::class)->group(function () {
            Route::get('/dashboard', 'Dashboard')->name('dashboard');
            Route::post('/logout', 'logout')->name('logout');
        });
    });
});


// ----------------------
// ✅ ADMIN ROUTES (Corrected - was already good)
// ----------------------
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// ----------------------
// ✅ SAMPLE DEMO ROUTE (No changes)
// ----------------------
Route::get('/sample-dashboard', function () {
    return view('frontend.pages.dashboards.dashboard_page');
})->name('sample.dashboard');
