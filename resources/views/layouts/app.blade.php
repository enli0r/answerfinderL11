<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'answerfinder') }}</title>

    

        {{-- Fonts
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap"> --}}


        {{-- jQuery --}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

        {{-- Icons --}}
        <script src="https://kit.fontawesome.com/769c20f8b9.js" crossorigin="anonymous"></script>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @livewireStyles
    </head>
    
    <body class="">


        <header class="container max-w-main mx-auto mb-5 mt-3 lg:px-5">
            <x-navbar />
        </header>

        <main class="container mx-auto max-w-main">  

            {{ $slot }}

        </main>


        {{-- @if (session('message'))
            <x-notification-success :redirect="true" messageToDisplay="{{ session('message') }}"/>
        @else
            <x-notification-success />
        @endif --}}

        @livewireScripts
    </body>
    
</html>
