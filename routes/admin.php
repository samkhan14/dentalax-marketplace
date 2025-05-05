<?php

use App\Http\Controllers\Admin\AdminDentistController;
use App\Http\Controllers\Admin\PlanController;
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

        // for admin plan routes
        Route::controller(PlanController::class)->group(function () {
            Route::get('/plan', 'index')->name('plans.index');
            Route::post('/plan', 'store')->name('plans.store');
            Route::get('/plan/{plan}/edit', 'edit')->name('plans.edit');
            Route::put('/plan/{plan}', 'update')->name('plans.update');
            Route::delete('/plan/{plan}', 'destroy')->name('plans.destroy');
        });

        // end protedted routes
    });


    // all routes end
});
