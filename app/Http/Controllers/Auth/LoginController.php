<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/redirect-by-role';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Este método renderiza el formulario de login (ya viene por defecto)
    public function showLoginForm()
    {
        return view('auth.login');
    }
}