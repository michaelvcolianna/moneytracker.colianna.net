<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MoneyTracker</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <x-shared.header />

        <main>
            {{ $slot }}
        </main>

        <x-shared.footer />

        <div hidden id="label-external">Opens an external website</div>
    </body>
</html>
