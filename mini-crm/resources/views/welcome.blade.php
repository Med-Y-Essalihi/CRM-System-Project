<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            
                body {
                    background: url("{{ asset('image/bg8.jpg') }}") no-repeat center center fixed;
                    background-size: cover;
                    color: white;
                    height: 100%;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                }

                .custom-link-Dashboard,.custom-link-Register {
                    color: white;
                    border: 1px solid transparent;
                    transition: border 0.2s;
                    padding: 5px;
                    border-radius: 10px;
                }
                .custom-link-Login{
                    color: white;
                    border: 1px solid transparent;
                    transition: border 0.2s;
                    padding: 5px;
                    border-radius: 10px;
                }
                .custom-link-Login:hover{
                    border-color: #00ADB5;
                    padding: 5px;
                    border-radius: 10px;
                }

                .custom-link-Dashboard,.custom-link-Register:hover {
                    border-color: #00ADB5;
                    padding: 5px;
                    border-radius: 10px;

                }
                
                .logo{
                    width: 80px;
                    height: 80px;
                    margin-top: 0px ;
                    justify-self: left;
                    margin: 0;
                }
                main {
                    width: 700px;
                    height: 700px;
                    text-align: center;
                    padding: 80px 20px;
                    flex: 1;
                    margin: 20px auto;
                    background-color: rgba(7, 7, 7, 0.534);   /* semi-transparent */
                    backdrop-filter: blur(10px);              /* blur effect */
                    -webkit-backdrop-filter: blur(10px);      /* Safari support */
                    border-radius: 10px;                      /* rounded corners */
                }



                main h2 {
                    font-size: 48px;
                    font-weight: bold;
                    margin-bottom: 20px;
                }

                main p {
                    font-size: 18px;
                    color: #ccc;
                    max-width: 700px;
                    margin: auto;
                    margin-bottom: 30px;
                }

                .cta-button {
                    background-color: #00ADB5;
                    color: #393E46;
                    text-decoration: none;
                    padding: 12px 30px;
                    border-radius: 6px;
                    font-size: 18px;
                    transition: background-color 0.3s;
                }

                .cta-button:hover {
                    background-color: #00959B;
                    color: #000000;
                }

                footer {
                    background-color: rgb(14, 0, 51);
                    text-align: center;
                    padding: 15px 0;
                    color: #ccc;
                    font-size: 14px;
                    
                    margin-bottom: 0;
                }
                html, body {
                    height: 100%;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                }
    </style>
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
          
        @endif
    </head>
    <body >
    <header>
        @if (Route::has('login'))
            <nav style="background-color: rgba(5, 0, 19, 0.5); display: grid; grid-template-columns: auto auto auto ; align-items: center; padding: 5px;">
            
            <a href="{{url('http://127.0.0.1:8000/')}}"><img src="{{ asset('image/logoPage.png') }}" alt="Logo" class="logo"></a>

            <!-- Centered H1 by placing it in first column and using justify-self center -->
            <h1 style="color: white; font-size: 30px; justify-self: center; margin: 0;">
                Welcome to <span style="color: #00ADB5">Task Master</span>
            </h1>

            <!-- Links container aligned right -->
            <div style="display: grid; grid-auto-flow: column; justify-content: end; gap: 10px;">
                @auth
                <a href="{{ url('/dashboard') }}" class="custom-link-Dashboard">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="custom-link-Login">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="custom-link-Register">Register</a>
                @endif
                @endauth
            </div>

            

            </nav>
        @endif

    </header>

         <main>
            <h2 style="color: #00ADB5;">
                Organize. Assign. Complete.
            </h2>
            <div class="max-w-3xl mx-auto mb-8 text-gray-300 text-lg md:text-xl leading-relaxed space-y-4">
                <p>
                    Welcome to <span class="text-[#00ADB5] font-semibold">Task Master</span> – your all-in-one platform for seamless task management, smarter collaboration, and increased team productivity.
                </p>

                <p>
                    Whether you're leading a startup or managing a growing business, Task Master helps you stay organized, delegate effectively, and meet your goals with confidence.
                </p>

                <p>
                    Founded by <span class="font-medium text-white">Med Yasser Essalihi</span>, the creator of <span class="text-[#00ADB5] font-semibold">Mey-Dev</span>, Task Master is built on a strong vision of simplifying work processes through intuitive and efficient digital tools.
                </p>
            </div>

            <a href="{{ route('register') }}" class="cta-button">
                Get Started
            </a>
        </main>
        <footer class="bg-[#393E46] text-center py-4 text-gray-400 text-sm">
            &copy; {{ date('Y') }} Task Master. All rights reserved.
        </footer>
    </body>
</html>
