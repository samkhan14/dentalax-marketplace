<?php

namespace App\Http\Controllers;

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


class ApplicantProfileController extends Controller
{
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

    public function applicantRegistrationStore(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'phone' => 'required|string|max:20',
        'city_id' => 'required|exists:cities,id',
        'experience' => 'nullable|string',
        'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'password' => [
            'required',
            'string',
            Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols(),
        ],
        'password_confirmation' => 'required|same:password',
        'terms' => 'required|accepted'
    ], [
        'terms.accepted' => 'Please accept the terms and conditions',
        'email.unique' => 'This email is already registered',
        'password_confirmation.same' => 'Passwords do not match',
        'resume.mimes' => 'Resume must be a PDF or Word document',
        'resume.max' => 'Resume must not exceed 2MB',
        'city_id.exists' => 'Selected city is invalid'
    ]);

    // Check if the email already exists
    if (User::where('email', $validated['email'])->exists()) {
        return response()->json([
            'success' => false,
            'message' => 'This email address is already registered.'
        ]);
    }

    // Handle file upload
    $resumePath = $request->file('resume')->store('resumes', 'public');

    DB::beginTransaction();
    try {
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Assign applicant role
        $user->assignRole('applicant');

        // Create applicant profile - MAKE SURE THESE FIELD NAMES MATCH YOUR DATABASE COLUMNS
        $applicantProfile = ApplicantProfile::create([
            'user_id' => $user->id,
            'city_id' => $validated['city_id'], // Ensure this matches your database column
            'phone' => $validated['phone'],    // Ensure this matches your database column
            'experience' => $validated['experience'] ?? null,
            'resume_path' => $resumePath,
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => route('applicant.login.page') // Redirect to login page
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        // Delete the uploaded file if transaction fails
        if (isset($resumePath)) {
            Storage::disk('public')->delete($resumePath);
        }

        return response()->json([
            'success' => false,
            'message' => 'Registration failed. Please try again.',
            'error' => $e->getMessage() // Only for debugging, remove in production
        ]);
    }
}

    public function applicantLoginPage()
    {
        return view('frontend.pages.applicant_login_page');
    }
    // Handle patient login
    public function applicantLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'angemeldet_bleiben' => 'nullable|boolean',
        ]);

        $credentials = $request->only('email', 'password');
        // $remember = $request->filled('angemeldet_bleiben');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $user = Auth::user()->load('roles');

            // ✅ Debug check (remove in production)
            // dd($user->getRoleNames());

            // ✅ Check if user is patient or applicant
            if ($user->hasRole('applicant')) {

                $request->session()->regenerate();

                return redirect()->intended(route('applicant.dashboard'));
            }

            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Diese Anmeldedaten sind für Patienten nicht gültig.'
            ]);
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
        return redirect()->route('applicant.login.page')->with('success', 'Sie haben sich erfolgreich abgemeldet.');
    }

}
