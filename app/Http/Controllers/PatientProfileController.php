<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRegistrationRequest;
use App\Services\PatientProfileService;
use Illuminate\Http\Request;
use App\Models\PatientProfile as Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\City;


class PatientProfileController extends Controller
{
    protected $patientProfileService;
    public function __construct(PatientProfileService $patientProfileService)
    {
        $this->patientProfileService = $patientProfileService;
    }
    public function Dashboard(Request $request)
    {
        $page = $request->get('page', 'home');
        return view('frontend.pages.dashboards.patient_dashboard', compact('page'));
    }

    public function patientRegistrationPage()
    {

        return view('frontend.pages.patient_registration_page');
    }

    public function patientRegistrationStore(PatientRegistrationRequest $request)
    {
        $validated = $request->validated();

        $result = $this->patientProfileService->patientRegistrationStore($validated);

        // Return success response
        return response()->json([
            'success' => $result['success'],
            'message' => $result['message'],
            'redirect' => $result['redirect'] ?? null,
        ]);
    }

    public function patientLoginPage()
    {
        return view('frontend.pages.patient_login_page');
    }

}


