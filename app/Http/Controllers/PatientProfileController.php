<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientProfileController extends Controller
{
    public function Dashboard()
    {
        return view('frontend.pages.dashboards.patient_applicant_dashboard');
    }
}
