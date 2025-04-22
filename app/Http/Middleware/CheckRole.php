<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        dd($request, $next, $role);

        if (!Auth::check()) {
            return match (true) {
                str_contains($request->path(), 'patienten') => redirect()->route('patient.login.page'),
                str_contains($request->path(), 'zahnarzt') => redirect()->route('dentist.login.page'),
                default => redirect()->route('main.registration.page'),
            };
        }

        // Check if user has the required role
        if (!Auth::user()->role === $role) {
            return redirect()->route("{$role}.login.page")->with('error', 'Zugriff nicht erlaubt');
        }


        return $next($request);
    }
}
