<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('assets/images/qing-jia-safaris-logo.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Scripts / Styles -->
        @vite('resources/css/app-layout.css')

        @isset($extra_head)
            {{ $extra_head }}
        @else
            <title>Qing Jia Safaris</title>
        @endisset
    </head>
    <body>
        <livewire:partials.app-navbar />

        <livewire:partials.flash-messages />

        <main class="app_layout">
            {{ $slot }}
        </main>

        {{-- Livewire --}}
        @livewireScripts

        {{-- Dynamic Scripts --}}
        @isset($scripts)
            {{ $scripts }}
        @endisset
        @stack('scripts')

        @isset($afterScripts)
            {{ $afterScripts }}
        @endisset
        @stack('after-scripts')
    </body>
</html>
