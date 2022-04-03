<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} | Money Tracker</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('storage/assets/css/app.css') }}" />
        <script src="{{ mix('storage/assets/js/app.js') }}" defer></script>
        @livewireStyles
    </head>

    <body>
        <header>
            <a href="{{ route('dashboard') }}">MoneyTracker</a>

            <x-shared.navigation />
        </header>

        <main class="page">
            <section class="page__header">
                <h1>{{ $title }}</h1>
            </section>

            <section class="page__{{ $route }}">
                {{ $slot }}
            </section>
        </main>

        <footer>
            <span>&copy; 2019-{{ date('Y') }}</span>
            <span>MVC</span>
        </footer>

        @livewireScripts
    </body>
</html>
