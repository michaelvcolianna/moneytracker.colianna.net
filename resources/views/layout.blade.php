<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Design: {{ $title }}</title>
        <link rel="stylesheet" href="{{ mix('storage/assets/css/app.css') }}" />
        <script src="{{ mix('storage/assets/js/app.js') }}" defer></script>
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

                @if($errors)
                    <section class="page__errors" role="alert">
                        <h3>Errors</h3>

                        <p>The following errors occurred:</p>

                        <ul>
                            <li>First</li>
                            <li>Second</li>
                            <li>Third</li>
                        </ul>
                    </section>
                @endif

                @if($status)
                    <section class="page__status" role="dialog">
                        <p>Status message here.</p>
                    </section>
                @endif

                <section class="page entries payperiods login">
                    {{ $slot }}
                </section>
            </main>

            <footer>
                &copy; 2019-2022 | <a href="#">Source Code Link</a> | Current Git hash | <a href="/?login&page=dashboard">Log In</a>
            </footer>
        </div>
    </body>
</html>
