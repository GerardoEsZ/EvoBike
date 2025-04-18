<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RHController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/inventario', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/ventas', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/produccion', [ProductionController::class, 'index'])->name('production.index');
    Route::get('/reparaciones', [RepairController::class, 'index'])->name('repairs.index');
    Route::get('/rh/reportes', [RHController::class, 'reports'])->name('rh.reports');
});

Route::middleware(['auth', 'role:admin|empleado'])->prefix('inventario')->group(function () {
    Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/crear', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/store', [InventoryController::class, 'store'])->name('inventory.store');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Rutas para usuarios con permisos limitados
    Route::get('/ventas', [SalesController::class, 'index'])->name('user.sales.index');
    Route::get('/pedidos', [OrderController::class, 'index'])->name('user.orders.index');
});

// Ruta POST para iniciar sesión
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Redirigir al login directamente desde la raíz
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta del dashboard (solo autenticados y verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas con autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas de perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para el administrador: registro de usuarios
    Route::get('/admin/register-user', [AdminController::class, 'showRegisterUserForm'])->name('admin.registerUserForm');
    Route::post('/admin/register-user', [AdminController::class, 'registerUser'])->name('admin.registerUser');
});

// Otras rutas como email verification, register, etc.
require __DIR__.'/auth.php';