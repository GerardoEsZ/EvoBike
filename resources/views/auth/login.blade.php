<x-guest-layout>
    <div class="login-container">
        <div class="login-box">
            <h2>Welcome Back</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="input-group mt-4">
                    <i class="fas fa-lock"></i>
                    <input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="checkbox" />
                        <span class="remember-text">Remember me</span>
                    </label>
                </div>

                <div class="actions">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
                    @endif

                    <button type="submit" class="submit-btn">Log in</button>
                </div>
            </form>

            <!-- Language Selector -->
            <div class="language-selector">
                <select onchange="changeLanguage(this)">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                </select>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    function changeLanguage(language) {
        window.location.href = `/lang/${language.value}`;
    }
</script>