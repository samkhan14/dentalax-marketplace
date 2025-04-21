<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\DentistDashboardController;
use App\Http\Controllers\DentistProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [UserController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.page');
    Route::get('/fuer-zahnaerzte', 'forDentists')->name('for_dentists');
    Route::get('/paketwahl', 'Packages')->name('packages');
    Route::get('/stellenangebote', 'jobOffers')->name('job_offers');
    Route::get('/stellenangebot/zfa-berlin', 'jobDetails')->name('job_details');
    Route::get('/ratgeber', 'Counselor')->name('counselor');
    Route::get('/kontakt', 'Contact')->name('contact');
    Route::get('/ueber-uns', 'aboutUs')->name('about_us');


    Route::get('/registrieren', 'mainRegistrationPage')->name('registration.page');
    Route::get('/passwort-vergessen', 'passwordForget')->name('password.forget.for.both');

    // for backend routes
    // dynamic route like dentist-in-berlin -- should be dynamic
    Route::get('/zahnaerzte-nach-staedten', 'allCities')->name('all_cities');
    Route::get('/zahnarzt-in/{city:slug}', 'dentistCityDetailPage')->name('city.doctor.details');


});


Route::controller(PatientProfileController::class)->group(function () {
    Route::get('/patient-registrieren', 'patientRegistrationPage')->name('patient.registration.page');
    Route::post('/patient-registrieren', 'patientRegistrationStore')->name('patient.registration.store');
    Route::get('/patienten-login', 'patientLoginPage')->name('patient.login.page');
    Route::post('/patienten-login', 'patientLoginStore')->name('patient.login');
    Route::get('/patienten-dashboard', 'Dashboard')->name('patient.dashboard');
});


Route::controller(DentistProfileController::class)->group(function () {
    Route::get('/zahnarzt-registrieren', 'dentistRegistrationPage')->name('dentist.registration.page');
    Route::post('/zahnarzt-registrieren', 'dentistRegistrationStore')->name('dentist.registration.store');
    Route::get('/zahnarzt-login', 'dentistLoginPage')->name('dentist.login.page');
    Route::post('/zahnarzt-login', 'dentistLoginStore')->name('dentist.login');
    Route::get('/zahnarzt-dashboard', 'Dashboard')->name('dentist.dashboard');
    Route::get('/zahnarzt/zahnarztpraxis-dr-mueller', 'landingPageForDentist')->name('dentist.landingpage');
});


// sample dashboard
Route::get('/sample-dashboard', function() {
    return view('frontend.pages.dashboards.dashboard_page');
})->name('sample.dashboard');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:dentist'])->group(function () {
    // Route::get('/dashboard/dentist', [DentistProfileController::class, 'index'])->name('dashboard.dentist');
    Route::post('/dentist/logout', [DentistProfileController::class, 'logout'])->name('dentist.logout');
});

Route::middleware(['auth', 'role:patient|applicant'])->group(function () {
    Route::get('/dashboard', [PatientProfileController::class, 'Dashboard'])->name('dashboard.shared');
    Route::post('/patient/logout', [PatientProfileController::class, 'logout'])->name('patient.logout');
});
