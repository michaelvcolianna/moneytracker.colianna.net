<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MoneyTracker</title>
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <meta name="theme-color" content="#faf9f6">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="Money">
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="{{ asset('iphone-retina.png') }}"
        >
        <link
            rel="apple-touch-startup-image"
            href="{{ asset('launch-screen.png') }}"
        >
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="{{ config('app.fonts') }}" rel="stylesheet" />
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
        @livewireStyles
        <style>[x-cloak] { display: none !important; }</style>
    </head>

    <body>
        <x-shared.header />

        <main>
            {{ $slot }}
        </main>

        <x-shared.footer />

        <div hidden id="label-external">Opens an external website</div>

        @livewireScripts
    </body>
</html>
