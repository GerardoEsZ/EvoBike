<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');

Auth::routes();

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest');
Route::post('register', [RegisterController::class, 'register']);

Route::get('admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'role:admin');

Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create')->middleware('auth', 'role:admin');
Route::post('admin/users', [UserController::class, 'store'])->middleware('auth', 'role:admin');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

