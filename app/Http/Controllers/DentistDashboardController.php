<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DentistDashboardController extends Controller
{
    public function index()
    {
        return view('frontend.pages.dashboards.dentist_dashboard');
    }
}
