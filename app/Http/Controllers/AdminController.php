<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Mostrar el formulario para registrar un nuevo usuario.
     */
    public function showRegisterUserForm()
    {
        return view('admin.register-user');
    }

    /**
     * Registrar un nuevo usuario en la base de datos.
     */
    public function registerUser(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'language' => 'required|in:es,en',  // Validación del idioma
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'language' => $validated['language'],  // Guardar el idioma
        ]);

        // Redirigir a donde sea necesario (en este caso dashboard)
        return redirect()->route('dashboard')->with('success', 'Usuario registrado exitosamente');
    }
}