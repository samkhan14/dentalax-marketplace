<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return match (true) {
                str_contains($request->path(), 'admin') => redirect()->route('admin.login.page'),
                str_contains($request->path(), 'patienten') => redirect()->route('patient.login.page'),
                str_contains($request->path(), 'zahnarzt') => redirect()->route('dentist.login.page'),
                str_contains($request->path(), 'antragsteller') => redirect()->route('applicant.login.page'),
                default => redirect()->route('main.registration.page'),
            };
        }

        if (!Auth::user()->hasRole($role)) {
            $userRole = Auth::user()->getRoleNames()->first();

            return match ($userRole) {
                'admin' => redirect()->route('admin.dashboard'),
                'dentist' => redirect()->route('dentist.dashboard'),
                'patient' => redirect()->route('patient.dashboard'),
                'applicant' => redirect()->route('applicant.dashboard'),
                default => redirect()->route('home.page'),
            };
        }

        return $next($request);
    }
}
