<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifiez si l'utilisateur authentifié est un administrateur
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Redirigez vers la page de login admin si non administrateur
        return redirect()->route('admin.login');
    }
}
