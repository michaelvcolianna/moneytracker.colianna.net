<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Design: {{ $title }}</title>
        <link rel="stylesheet" href="{{ mix('storage/assets/css/app.css') }}" />
        <script src="{{ mix('storage/assets/js/app.js') }}" defer></script>
        @livewireStyles
    </head>

    <body>
        <div class="wrapper">
            <header>
                <a href="/" class="branding">MoneyTracker</a>

                @if($login)
                    <nav aria-label="Areas">
                        <ul>
                            <li>
                                <a href="/?login&page=dashboard">Dashboard</a>
                            </li>

                            <li>
                                <a href="/?login&page=payperiods">Pay Periods</a>
                            </li>

                            <li>
                                <a href="/?login&page=payees">Payees</a>
                            </li>

                            <li>
                                <a href="/">Log Out</a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </header>

            <main>
                <section class="page__title">
                    <h1>{{ $title }}</h1>
                </section>

                @include('partials.error-messages')
                @include('partials.status-message')

                <section class="page entries payperiods login">
                    {{ $slot }}
                </section>
            </main>

            <footer>
                &copy; 2019-{{ date('Y') }} | <a href="#">Source Code Link</a> | {{ $git['hash'] . ' [' . $git['branch'] . ']' }} | <a href="/?login&page=dashboard">Log In</a>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
