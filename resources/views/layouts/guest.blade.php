<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img class="w-15 h-20 fill-current text-gray-500" src="{{asset('/img/cetis.png')}}">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden" style="background-color: #A7201F; border-radius: 10px 10px 0px 0px;">
            </div>
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden" style="border-radius: 0px 0px 10px 10px;">
                {{ $slot }}
            </div>
            @if (Route::is('login'))
            <br><br> 
            <label style="white-space: nowrap;" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('¿No tienes una cuenta? ') }}</label>  
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">Registrate.</a>
            @endif
        </div>
    </body>
</html>
