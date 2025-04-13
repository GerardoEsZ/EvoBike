<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\ReporteController;

// Rutas de autenticación (automáticamente genera las rutas de login, registro, etc.)
Auth::routes();

// Página principal (login) - Mostrar login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Redirigir según el rol del usuario después del login
Route::get('/redirect-by-role', function () {
    $user = auth()->user();

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

    abort(403, 'Rol no asignado');
})->middleware('auth')->name('redirect-by-role');

// Dashboard - Administrador
Route::get('/admin', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

// Dashboard - Cliente
Route::get('/cliente', [DashboardController::class, 'cliente'])
    ->middleware(['auth', 'role:cliente'])
    ->name('cliente.dashboard');

// Dashboard - Producción
Route::get('/produccion', [DashboardController::class, 'produccion'])
    ->middleware(['auth', 'role:empleado_produccion'])
    ->name('produccion.dashboard');

// Dashboard - Reparación
Route::get('/reparacion', [DashboardController::class, 'reparacion'])
    ->middleware(['auth', 'role:empleado_reparacion'])
    ->name('reparacion.dashboard');

// Rutas de pedidos
Route::get('/pedidos', [PedidoController::class, 'index'])
    ->middleware(['auth', 'role:admin|cliente|empleado_produccion'])
    ->name('pedidos.index');

// Rutas de reparaciones
Route::get('/reparaciones', [ReparacionController::class, 'index'])
    ->middleware(['auth', 'role:admin|empleado_reparacion'])
    ->name('reparaciones.index');

// Rutas de producción
Route::get('/produccion/registro', [ProduccionController::class, 'registro'])
    ->middleware(['auth', 'role:empleado_produccion'])
    ->name('produccion.registro');

// Reportes (solo accesible para admin)
Route::get('/reportes', [ReporteController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.reportes');

// Cambio de idioma
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');