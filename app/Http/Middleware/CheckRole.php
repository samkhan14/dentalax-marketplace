<?php
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 🚫 If user is not logged in
        if (!Auth::check()) {
            return match (true) {
                str_contains($request->path(), 'patienten')     => redirect()->route('patient.login.page'),
                str_contains($request->path(), 'zahnarzt')       => redirect()->route('dentist.login.page'),
                str_contains($request->path(), 'antragsteller')  => redirect()->route('applicant.login.page'),
                default => redirect()->route('main.registration.page'),
            };
        }

        // ✅ If user is logged in but role doesn't match, redirect to their own dashboard
        if (!Auth::user()->hasRole($role)) {
            $userRole = Auth::user()->getRoleNames()->first(); // Get assigned role

            return match ($userRole) {
                'dentist'   => redirect()->route('dentist.dashboard'),
                'patient'   => redirect()->route('patient.dashboard'),
                'applicant' => redirect()->route('applicant.dashboard'),
                default     => redirect()->route('home.page'),
            };
        }

        // ✅ All good – let request proceed
        return $next($request);
    }
}
