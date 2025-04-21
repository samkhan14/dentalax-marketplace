<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\City;
use App\Models\DentistProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DentistProfileController extends Controller
{
    public function dentistRegistrationPage(Request $request)
    {
        if ($request->has('plan_id')) {
            session([
                'selected_plan_id' => $request->plan_id,
                'selected_billing_type' => $request->billing_cycle ?? 'monthly',
            ]);
        }

        $plan = session('selected_plan_id')
            ? Plan::find(session('selected_plan_id'))
            : Plan::where('is_default', true)->first();

        $cities = City::orderBy('name')->get();

        //  dd($plan, $this->data);

        return view('frontend.pages.dentist_registration_page', compact('plan', 'cities'));
    }

    public function dentistRegistrationStore(Request $request)
    {
        $validated = $request->validate([
            'vorname' => 'required|string|max:255',
            'nachname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
            'password_confirmation' => 'required|same:password',
            'practice_name' => 'required|string|max:255',
            'practice_description' => 'required|string',
            'permanent_address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'plan_id' => 'required|exists:plans,id',
            'billing_cycle' => 'nullable|in:monthly,yearly',
            'datenschutz' => 'required|accepted'
        ], [
            'datenschutz.accepted' => 'Sie müssen die Datenschutzerklärung akzeptieren.',
            'email.unique' => 'Diese E-Mail ist bereits registriert.',
            'password_confirmation.same' => 'Die Passwörter stimmen nicht überein.'
        ]);

        if (User::where('email', $validated['email'])->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Diese E-Mail-Adresse ist bereits registriert.'
            ]);
        }

        // Create user
        $user = User::create([
            'name' => $validated['vorname'] . ' ' . $validated['nachname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        // Assign role to user
        $user->assignRole('dentist');
        // Create dentist profile
        DentistProfile::create([
            'user_id' => $user->id,
            'city_id' => $validated['city_id'],
            'plan_id' => $validated['plan_id'] ?? 1,
            'foundation_experience' => 'not specified',
            'expertise_areas' => $validated['expertise_areas'] ?? null,
            'logo' => $validated['logo'] ?? null,
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'practice_name' => $validated['practice_name'],
            'practice_description' => $validated['practice_description'],
            'permanent_address' => $validated['permanent_address'],
            'postal_code' => $validated['postal_code'],
            'phone' => $validated['phone'],
            'website' => $validated['website'],
            'status' => 'unclaimed'
        ]);

        // Clear session
        session()->forget(['selected_plan_id', 'selected_billing_type']);

        return response()->json([
            'success' => true,
            'message' => 'Registrierung erfolgreich!',
            'redirect' => route('dentist.dashboard')
        ]);
    }

    public function dentistLoginPage()
    {

        return view('frontend.pages.dentist_login_page');
    }


    public function Dashboard(Request $request)
    {

        return view('frontend.pages.dashboards.dentist_dashboard');
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();
        $request->session()->invalidate();
        // Regenerate the session token
        $request->session()->regenerateToken();
        return redirect()->route('dentist.login.page')->with('success', 'Sie haben sich erfolgreich abgemeldet.');
    }


}
