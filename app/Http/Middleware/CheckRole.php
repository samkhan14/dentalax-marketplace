<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return match (true) {
                str_contains($request->path(), 'patienten') => redirect()->route('patient.login.page'),
                str_contains($request->path(), 'zahnarzt') => redirect()->route('dentist.login.page'),
                default => redirect()->route('main.registration.page'),
            };
        }

        // ✅ Use Spatie's hasRole check
        if (!Auth::user()->hasRole($role)) {
            return redirect()->route("{$role}.login.page")->with('error', 'Zugriff nicht erlaubt');
        }

        return $next($request);
    }
}
