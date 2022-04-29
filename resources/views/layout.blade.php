<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} | Money Tracker</title>
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="Money">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('iphone-retina.png') }}">
        <link rel="apple-touch-startup-image" href="{{ asset('launch-screen.png') }}">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@700&family=Radio+Canada:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('storage/assets/css/app.css') }}" />
        <script src="{{ mix('storage/assets/js/app.js') }}" defer></script>
        @livewireStyles
    </head>

    <body>
        <header>
            <a href="{{ route('dashboard') }}">MoneyTracker</a>

            <x-shared.navigation />
        </header>

        <main class="page page__{{ $route }}">
            <section class="page__header">
                <h1>{{ $title }}</h1>

                @if(isset($form))
                    <livewire:is component="form.add.{{ $form }}" />
                @endif
            </section>

            <section class="page__content">
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
