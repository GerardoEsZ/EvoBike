@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-blue-200 to-purple-300 flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fade-in">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-700">🚲 Inicia Sesión en <span class="text-indigo-600">EvoBike</span></h2>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Correo</label>
                <input type="email" name="email" class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-gray-700">Contraseña</label>
                <input type="password" name="password" class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-lg hover:bg-indigo-700 transition duration-300">Ingresar</button>
        </form>
    </div>
</div>
@endsection

