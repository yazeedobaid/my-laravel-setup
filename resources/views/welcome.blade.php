<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">

    </head>
    <body class="font-raleway h-screen bg-gray-200">
    <header class="w-full h-16 bg-gray-100 shadow">
        @if (Route::has('login'))
            <nav class="flex justify-end items-center h-full text-gray-700">
                @auth
                    <a href="{{ url('/home') }}" class="mr-6 text-gray-600">Home</a>
                @else
                    <a href="{{ route('login') }}" class="mx-4">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 mr-4 py-2 px-4 bg-gray-300 border rounded-full border-transparent hover:bg-gray-400">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <main class="flex flex-col justify-center items-center mt-48">
        <h2 class="text-4xl text-gray-700">Welcome!</h2>
    </main>
    </body>
</html>
