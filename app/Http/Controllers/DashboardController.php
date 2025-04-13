<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Método para redirigir al dashboard según el rol
    public function redirectByRole()
    {
        $user = Auth::user();  // Obtenemos el usuario autenticado

        // Verificamos el rol del usuario y lo redirigimos al dashboard correspondiente
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('cliente')) {
            return redirect()->route('cliente.dashboard');
        }

        if ($user->hasRole('empleado_produccion')) {
            return redirect()->route('produccion.dashboard');
        }

        if ($user->hasRole('empleado_reparacion')) {
            return redirect()->route('reparacion.dashboard');
        }

        // Si no tiene rol asignado, mostramos un error 403
        abort(403, 'Rol no asignado');
    }

    // Métodos para los dashboards de cada rol
    public function admin()
    {
        return view('dashboards.admin');
    }

    public function cliente()
    {
        return view('dashboards.cliente');
    }

    public function produccion()
    {
        return view('dashboards.produccion');
    }

    public function reparacion()
    {
        return view('dashboards.reparacion');
    }
}
