<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MM Storyteller</title>
        <link rel="icon" href="{{ asset('assets/img/logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link rel="stylesheet" href="(( asset('assets/css/bootstrap.min.css') ))">
        <style>
            .toastify{
                background-image: unset !important;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <img src="{{ asset('assets/img/logo.png') }}" width="100px" alt="">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if (Session::has('error'))
        <script>
            Toastify({
                text:"{{Session::get('error')}}",
                style: {
                    background: "red",
                    color: 'white',
                },
                position:'center'
            }).showToast();
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Toastify({
                text:"{{Session::get('success')}}",
                className:"text-white",
                style: {
                    background: "#38d100",
                },
                position:'center'
            }).showToast();
        </script>
    @endif
    </body>
</html>
