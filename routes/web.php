<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/register-user', [AdminController::class, 'showRegisterUserForm'])->name('admin.registerUserForm');
    Route::post('/admin/register-user', [AdminController::class, 'registerUser'])->name('admin.registerUser');
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