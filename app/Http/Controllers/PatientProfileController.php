<?php

namespace App\Http\Controllers;

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
    public function Dashboard()
    {
        return view('frontend.pages.dashboards.patient_applicant_dashboard');
    }

    public function patientRegistrationPage()
    {

        return view('frontend.pages.patient_registration_page');
    }

    public function patientRegistrationStore(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'vorname' => 'required|string|max:255',
            'nachname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
            'password_confirmation' => 'required|same:password',
            'postal_code' => 'nullable|string|max:10',
            'city' => 'nullable|string|max:255',
            'datenschutz' => 'required|accepted'
        ], [
            'datenschutz.accepted' => 'Bitte akzeptieren Sie die Datenschutzbestimmungen',
            'email.unique' => 'Diese E-Mail ist bereits registriert',
            'password_confirmation.same' => 'Passwörter stimmen nicht überein'
        ]);

        // Check if the email already exists in the users table
        if (User::where('email', $validated['email'])->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Diese E-Mail-Adresse ist bereits registriert.'
            ]);
        }

        // Create the user in the users table
        $user = User::create([
            'name' => $validated['vorname'] . ' ' . $validated['nachname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Assign the role of 'patient' to the user
        $user->assignRole('patient');

        // Create the patient in the patients table with the user_id
        $patient = Patient::create([
            'user_id' => $user->id,
            'name' => $validated['vorname'] . ' ' . $validated['nachname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'postal_code' => $validated['postal_code'],
            'city' => $validated['city'],
            'dob' => $validated['dob'] ?? null,
            'gender' => 'Not Specified',
        ]);

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Registrierung erfolgreich!',
            'redirect' => route('patient.login.page')
        ]);
    }

    public function patientLoginPage()
    {
        return view('frontend.pages.patient_login_page');
    }

    // Handle patient login
    public function patientLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'angemeldet_bleiben' => 'nullable|boolean',
        ]);

        $credentials = $request->only('email', 'password');
        // $remember = $request->filled('angemeldet_bleiben');

        dd($credentials);

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user->role !== 'patient') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => 'Diese Anmeldedaten sind für Patienten nicht gültig.'
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('patient.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();
        $request->session()->invalidate();
        // Regenerate the session token
        $request->session()->regenerateToken();
        return redirect()->route('patient.login.page')->with('success', 'Sie haben sich erfolgreich abgemeldet.');
    }

}


