<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.title') }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-300 via-indigo-200 to-purple-200 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">
            <i class="fas fa-lock mr-2"></i>{{ __('auth.title') }}
        </h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">
                    {{ __('auth.email') }}
                </label>
                <div class="relative">
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm mt-1" />
                    <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    {{ __('auth.password') }}
                </label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm mt-1" />
                    <i class="fas fa-lock absolute right-3 top-3 text-gray-400"></i>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Idioma (oculto, se establecerá al registrarse o iniciar sesión) -->
            <input type="hidden" name="language" value="es"> <!-- Idioma predeterminado, puede cambiarse si es necesario -->

            <!-- Recordarme -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">
                    {{ __('auth.remember') }}
                </label>
            </div>

            <!-- Enviar -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        {{ __('auth.forgot') }}
                    </a>
                @endif

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                    {{ __('auth.submit') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>