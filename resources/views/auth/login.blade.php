<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-emerald-200 to-white p-6">
        
        {{-- TARJETA --}}
        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 border border-emerald-300 backdrop-blur">

            {{-- LOGO PERSONALIZADO --}}
            <div class="flex justify-center mb-6">
                <img src="{{ asset('Logo_vet.png') }}" 
                     alt="Logo veterinaria"
                     class="w-28 h-28 object-contain drop-shadow-lg">
            </div>

            <h2 class="text-center text-2xl font-bold text-emerald-700 mb-6">
                Bienvenido
            </h2>

            {{-- VALIDATION ERRORS --}}
            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-emerald-700" />
                    <x-input id="email" class="block mt-1 w-full border-emerald-300 focus:ring-emerald-500 focus:border-emerald-500"
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                {{-- PASSWORD --}}
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-emerald-700" />
                    <x-input id="password" class="block mt-1 w-full border-emerald-300 focus:ring-emerald-500 focus:border-emerald-500"
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                {{-- REMEMBER --}}
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="text-emerald-600" />
                        <span class="ms-2 text-sm text-gray-700">Recordarme</span>
                    </label>
                </div>

                {{-- BOTONES --}}
                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-emerald-700 hover:text-emerald-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
                           href="{{ route('password.request') }}">
                            ¿Olvidaste la contraseña?
                        </a>
                    @endif

                    <x-button class="ms-4 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                        Iniciar sesión
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
