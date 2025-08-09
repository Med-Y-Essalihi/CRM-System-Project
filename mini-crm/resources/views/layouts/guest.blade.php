<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            html,
            body {
                height: 100%;
                margin: 0;
            }
            body {
                background: url("{{ asset('image/bg8.jpg') }}") no-repeat center center fixed;
                background-size: cover;
                color: white;
                min-height: 100vh;
                margin: 0;
                display: flex;
                flex-direction: column;
            }
            #title{
                font-size: 30px;
                font-weight: 700;
                text-shadow: 5px 5px 5px black;
            }
            
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" >
        <div>
            <a href="/" >
                <x-application-logo class="mainlogo " style="   color: #ffffff; " />
            </a>
        </div>

        <h1 id="title">Welcome</h1>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" >
            {{ $slot }}
        </div>

    </div>
    </body>

</html>
