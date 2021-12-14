<x-guest-layout>
    <section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="{{ url('/uploads') }}" class="text-xs font-bold uppercase">
            Uploads
            </a>
        </div>
        <div class="mt-8 md:mt-0">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                    class="text-xs font-bold uppercase">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                    class="text-xs font-bold uppercase">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                        class="text-xs font-bold uppercase">Register</a>
                    @endif
                @endauth
            @endif
            <a href="{{ url('/') }}" class="text-xs font-bold uppercase">Home Page</a>
        </div>
    </nav>
    </section>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
