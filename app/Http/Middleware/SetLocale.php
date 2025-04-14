<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $language = Auth::user()->language; // Obtener el idioma del usuario
            App::setLocale($language); // Establecer el idioma
            Session::put('locale', $language); // Guardar en la sesión
        }
    
        return $next($request);
    }
}; 
