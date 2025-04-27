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

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $role = $user->getRoleNames()->first();

            return match ($role) {
                'patient' => redirect()->route('patient.dashboard'),
                'dentist' => redirect()->route('dentist.dashboard'),
                'applicant' => redirect()->route('applicant.dashboard'),
                default => redirect()->route('home.page'),
            };
        }

        return back()->withErrors(['email' => 'Ungültige Zugangsdaten.']);

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
