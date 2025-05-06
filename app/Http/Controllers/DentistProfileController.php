<?php

namespace App\Http\Controllers;

use App\Http\Requests\DentistRegistrationRequest;
use App\Services\DentistProfileService;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\City;
use Illuminate\Support\Facades\Session;
use App\Models\DentistProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DentistProfileController extends Controller
{
    protected $dentistProfileService;

    public function __construct(DentistProfileService $dentistProfileService)
    {
        $this->dentistProfileService = $dentistProfileService;
    }
    public function dentistRegistrationPage(Request $request)
    {
        // Save plan selection to session if coming from pricing page
        if ($request->filled('plan_id')) {
            session([
                'selected_plan_id' => $request->plan_id,
                'selected_plan_slug' => $request->plan_slug,
                'selected_billing_type' => $request->billing_cycle ?? 'monthly',
            ]);
        }

        // Retrieve selected plan or fallback to default
        $planId = session('selected_plan_id');
        $plan = Plan::find($planId) ?? Plan::where('is_default', true)->first();

        if (!$plan) {
            return redirect()->route('pricing')->with('error', 'Plan not found. Please select again.');
        }

        // Use session value or fallback
        $planSlug = session('selected_plan_slug', $plan->slug);
        $billingCycle = session('selected_billing_type', 'monthly');

        $cities = City::orderBy('name')->get();

        return view('frontend.pages.dentist_registration_page', compact(
            'plan',
            'cities',
            'billingCycle',
            'planSlug'
        ));
    }

    public function dentistRegistrationStore(DentistRegistrationRequest $request)
    {
        $validated = $request->validated();

        $result = $this->dentistProfileService->dentistRegistrationStore($validated);

        // Clear plan session
        session()->forget(['selected_plan_id', 'selected_billing_type']);

        return response()->json([
            'success' => $result['success'],
            'message' => $result['message'],
            'redirect' => $result['redirect'] ?? null,
        ]);
    }

    public function dentistLoginPage()
    {

        return view('frontend.pages.dentist_login_page');
    }

    public function Dashboard(Request $request)
    {
        $page = $request->get('page', 'dashboard');
        $profileData = $request->user()->dentistProfile;
        $plan = $profileData->plan;
        //  dd($profileData);
        return view('frontend.pages.dashboards.dentist_dashboard', compact('profileData', 'plan', 'page'));
    }

    public function dentistWizard(){
        return view('frontend.pages.practice_wizard');
    }

}
