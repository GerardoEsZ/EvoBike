<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Obtén el usuario autenticado
        $user = Auth::user();

        // Verifica si el usuario tiene uno de los roles
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        // Si no tiene el rol adecuado, redirige a la página de acceso denegado
        abort(403, 'Acceso denegado');
    }
}
