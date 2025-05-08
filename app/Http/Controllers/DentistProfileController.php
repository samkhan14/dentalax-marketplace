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
        // Retrieve selected plan or fallback to default
        $planId = $request->get('plan_id');
        $plan = Plan::find($planId) ?? Plan::where('is_default', true)->first();

        if (!$plan) {
            return redirect()->route('packages')->with('error', 'Plan not found. Please select again.');
        }

        // Use session value or fallback
        $planSlug = $request->get('plan_slug', $plan->slug);
        $billingCycle = $request->get('billing_cycle', 'monthly');

        $cities = City::orderBy('name')->get();

        return view('frontend.pages.dentist_registration_page', compact(
            'plan',
            'cities',
            'billingCycle',
            'planSlug'
        ));
    }

    public function selectPaymentGateway()
    {

        $formData = session('dentist_form_data');
        if (!$formData) {
            return redirect()->route('dentist.registration.page')->withErrors(['msg' => 'Session expired. Bitte registrieren Sie erneut.']);
        }

        $plan = Plan::find($formData['plan_id']);
        // Determine price based on billing cycle
        $billingCycle = $formData['billing_cycle'];
        $baseAmount = 0.00;

        if ($plan->slug === 'praxispro') {
            $amount = $billingCycle === 'monthly' ? 59.00 : 636.00;
        } elseif ($plan->slug === 'praxisplus') {
            $amount = $billingCycle === 'monthly' ? 89.00 : 960.00;
        } else {
            $amount = $baseAmount; // fallback for other plans
        }

        // Calculate VAT (19%) and Net
        $vat = round($amount * 0.19, 2);
        $net = round($amount - $vat, 2);
        return view('frontend.pages.dentist_payment_gateway', [
            'plan' => $plan,
            'billing_type' => $formData['billing_cycle'],
            'amount' => $amount,
            'net' => $net,
            'vat' => $vat,
            'formData' => $formData
        ]);
    }

    public function dentistRegistrationStore(DentistRegistrationRequest $request)
    {
        try {
            $validated = $request->validated();

            $result = $this->dentistProfileService->dentistRegistrationStore($validated);

            // Clear plan session
            session()->forget(['selected_plan_id', 'selected_billing_type']);

            return response()->json([
                'success' => $result['success'] ?? false, // Check if key exists
                'message' => $result['message'] ?? 'Registration failed: Unknown error.',
                'redirect' => $result['redirect'] ?? null,
            ]);

        } catch (\Exception $e) {
            // Handle exception gracefully
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage(),
            ]);
        }
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

    public function dentistWizard()
    {
        return view('frontend.pages.practice_wizard');
    }

    public function storeDentistWizard(Request $request)
    {

    }


}
