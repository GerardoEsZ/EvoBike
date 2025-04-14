<?php
// app/Http/Controllers/Admin/UserAdminController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'language' => 'required|in:es,en',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'language' => $request->language,
        ]);

        return redirect()->back()->with('success', 'Usuario registrado exitosamente.');
    }
}
