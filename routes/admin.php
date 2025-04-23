<?php

use App\Http\Controllers\Admin\AdminDentistController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Admin\AdminDashboardController;


// ----------------------
// ✅ ADMIN ROUTES
// ----------------------
Route::prefix('/admin')->name('admin.')->group(function () {
    // Public routes (no auth)
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/login', 'adminLoginPage')->name('login.page');
        Route::post('/login-in', 'adminLogin')->name('login.in');
    });


    // Protected routes (require auth and patient role)
    Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
        // for admin dashboard routes
        Route::controller(AdminDashboardController::class)->group(function () {
            // for dashboard routes
            Route::get('/dashboard', 'Dashboard')->name('dashboard');
            Route::post('/logout', 'logout')->name('logout');
            // for users routes
            Route::get('/users', 'Users')->name('users');
        });

        // for admin dentist profile routes
        Route::controller(AdminDentistController::class)->group(function () {
            // for dentist routes
            Route::get('/zahnarzt-import', 'importDentists')->name('dentist.import');
            Route::get('/zahnarzt', 'allDentists')->name('dentists');
            Route::get('/zahnarzt/{dentist:slug}', 'dentistDetails')->name('dentist.details');
            Route::get('/zahnarzt/{dentist:slug}/edit', 'dentistEdit')->name('dentist.edit');
            Route::post('/zahnarzt/{dentist:slug}/edit', 'dentistUpdate')->name('dentist.update');
            Route::get('/zahnarzt/{dentist:slug}/delete/confirm', 'dentistDeleteConfirm')->name('dentist.delete.confirm');
        });

        // end protedted routes
    });


    // all routes end
});
