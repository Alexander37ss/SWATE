<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('cssswate/main.css')}}">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
 
            </div>

            <div class="w-full sm:max-w-md mt-6 px-1 py-1 shadow-md overflow-hidden" style="background-color: #A7201F; border-radius: 0px 0px 0px 0px;">
            </div>
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden" style="border-radius: 0px 0px 0px 0px;">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
