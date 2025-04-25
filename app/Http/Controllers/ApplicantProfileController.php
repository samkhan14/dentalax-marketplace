<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\City;
use App\Models\ApplicantProfile;
use App\Services\ApplicantProfileService;

class ApplicantProfileController extends Controller
{
    protected $applicantProfileService;

    public function __construct(ApplicantProfileService $applicantProfileService)
    {
        $this->applicantProfileService = $applicantProfileService;
    }
    public function Dashboard(Request $request)
    {
        $page = $request->get('page', 'dashboard');
        return view('frontend.pages.dashboards.applicant_dashboard', compact('page'));
    }

    public function applicantRegistrationPage()
    {
        $cities = City::all();
        return view('frontend.pages.applicant_registration_page', compact('cities'));
    }

    public function applicantRegistrationStore(ApplicantRegistrationRequest $request)
    {
        // Validate the request
        $validated = $request->validated();

        $user = $this->applicantProfileService->applicantRegistrationStore($validated);

        // Return success response
        return response()->json([
            'success' => $user['success'],
            'redirect' => $user['redirect'] ?? null,
            'message' => $user['message'] ?? null,
        ]);

    }

    public function applicantLoginPage()
    {
        return view('frontend.pages.applicant_login_page');
    }

}
