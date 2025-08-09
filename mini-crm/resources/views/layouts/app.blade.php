<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

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
            /* Make main container flex and full height */
            .min-h-screen {
                flex: 1;
                display: flex;
                flex-direction: column;
                /* Remove bg-gray-100 and dark:bg-gray-900 */
                background: transparent !important;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen" >
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow" style="background-color: rgba(5, 0, 19, 0.5)">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{-- Alerts and Error Messages --}}
                <x-layout.alert type="success" :message="session('success')" />
                <x-layout.alert type="error" :message="session('error')" />

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
