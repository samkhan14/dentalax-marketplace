<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePracticeWizardIsAccessible
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('dentist.login.page')->with('redirect_to', url()->current());
        }

        if ($user->practice_wizard_completed) {
            return redirect()->route('dashboard')->with('error', 'You already submitted your practice details.');
        }

        return $next($request);
    }

}
