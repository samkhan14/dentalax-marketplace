<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\City;
use App\Models\DentistProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function adminLoginPage()
    {
        return view('backend.pages.adminLogin');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        // $remember = $request->filled('remember');

        if (Auth::attempt($credentials)) {
            $user = Auth::user()->load('roles');

            // ✅ Debug check (remove in production)
            //  dd( $user,$user->getRoleNames());

            // ✅ Check if user is patient or applicant
            if ($user->hasRole('admin')) {
                $request->session()->regenerate();

                return redirect()->intended(route('admin.dashboard'));
            }

            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Diese Anmeldedaten sind für admin nicht gültig.'
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
        return redirect()->route('admin.login.page')->with('success', 'Sie haben sich erfolgreich abgemeldet.');
    }
    public function Dashboard(Request $request)
    {
        $page = $request->get('page', 'dashboard');
        return view('backend.pages.admin_dashboard', compact('page'));
    }

    public function Users()
    {
        $users = User::all();
        $users->load('roles');
        // dd($users);
        return view('backend.pages.users.users', compact('users'));
    }

    public function allDoctors()
    {
        $users = User::all();
        $users->load('roles');
        // dd($users);
        return view('backend.pages.users.users', compact('users'));
    }
}
