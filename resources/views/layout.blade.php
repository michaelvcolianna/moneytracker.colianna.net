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
        @auth
            <header>
                <a href="/">MoneyTracker</a>

                <nav>
                    <a href="#">Entries</a>
                    <a href="#">Forecast</a>
                    <a href="#">Payees</a>
                </nav>
            </header>
        @endauth

        {{ $slot }}

        @auth
            <footer>
                <form method="POST" action="{{ route('logout') }}" x-data x-ref="logout">
                    @csrf

                    <a href="#" @click.prevent="$refs.logout.submit()">Logout</a>
                </form>
            </footer>
        @endauth
    </body>
</html>
