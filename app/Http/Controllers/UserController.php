<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $expectedRole = $request->input('expected_role'); // 'patient', 'applicant', 'dentist'

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user's status is 1
            if ($user->status !== 1) {
                Auth::logout();

                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Ihr Konto ist derzeit deaktiviert. Bitte kontaktieren Sie den Support.']);
            }

            // Check if the user has the expected role
            if (!$user->hasRole($expectedRole)) {
                Auth::logout();

                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Diese Zugangsdaten gehören nicht zu einem ' . ucfirst($expectedRole) . '-Konto.']);
            }

            $request->session()->regenerate();

            $redirectRoute = match ($expectedRole) {
                'dentist' => route('dentist.dashboard'),
                'patient' => route('patient.dashboard'),
                'applicant' => route('applicant.dashboard'),
                default => route('home.page'),
            };

            return redirect()->intended($redirectRoute);
        }

        return redirect()->back()
            ->withInput()
            ->withErrors(['email' => 'Ungültige Anmeldedaten.']);
    }

    public function userLogout(Request $request)
    {
        $role = Auth::user()?->getRoleNames()->first();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return match ($role) {
            'patient' => redirect()->route('patient.login.page'),
            'dentist' => redirect()->route('dentist.login.page'),
            'applicant' => redirect()->route('applicant.login.page'),
            default => redirect()->route('home.page'),
        };
    }







}
