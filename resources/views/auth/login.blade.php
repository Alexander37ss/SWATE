<style>
    .bg-custom{
        background-color: #A7201F;
    }
    .bg-custom:hover{
        background-color: #DA3B3A;
    }
    .bg-custom:focus{
        background-color: #DA3B3A;
    }
    .bg-custom:active{
        background-color: #DA3B3A;
    }
</style>
<link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <a href="{{url('/login')}}">
                    <img class="w-10 h-12 fill-current text-gray-800 logo-cetis mt-1 mb-2" src="{{asset('/img/cetis.png')}}">
                </a>
                <hr>
                <br>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electronico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        
        <div class="flex mt-4 justify-end">
            <div class="block mt-4 items-center mr-custom">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
<!--                 <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Has olvidado la contraseña?') }}
                </a> -->
            @endif

            <!-- Botón iniciar sesion -->
            <div class="mt-3  ml-custom-dos">
                <button class=" button-login text-custom btn-login inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-custom focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;">Iniciar sesión</button>
            </div>
        </div>
    </form>
</x-guest-layout>

