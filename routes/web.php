<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['es', 'en'])) {
        session(['lang' => $lang]);
        app()->setLocale($lang);
    }
    return redirect()->back();
});

// Redirigir al login directamente al visitar la raíz
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta del dashboard (para usuarios ya autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Este archivo contiene todas las rutas del login/register/logout/email verification, etc.
require __DIR__.'/auth.php';