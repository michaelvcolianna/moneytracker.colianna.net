<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ config('app.force_scheme') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Design: {{ $title }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('storage/assets/css/app.css') }}" />
        <script src="{{ mix('storage/assets/js/app.js') }}" defer></script>
        @livewireStyles
    </head>

    <body>
        <div class="wrapper">
            <header>
                <a href="{{ route('dashboard') }}" class="branding">MoneyTracker</a>

                @auth
                    <nav aria-label="Areas">
                        <ul>
                            <li>
                                <x-shared.nav-link route="dashboard" icon="dashboard" label="Dashboard" />
                            </li>

                            <li>
                                <x-shared.nav-link route="pay-periods" icon="pay-periods" label="Pay Periods" />
                            </li>

                            <li>
                                <x-shared.nav-link route="payees" icon="payees" label="Payees" />
                            </li>

                            <li>
                                <x-shared.nav-link route="logout" icon="log-out" label="Log Out" onclick="event.preventDefault(); this.nextElementSibling.submit();" />
                                <form method="POST" action="{{ route('logout') }}"><input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
                            </li>
                        </ul>
                    </nav>
                @endauth
            </header>

            <main>
                <section class="page__title">
                    <h1>{{ $title }}</h1>
                </section>

                @include('partials.layout.error-messages')
                @include('partials.layout.status-message')

                <section class="page entries pay-periods payees login">
                    {{ $slot }}
                </section>
            </main>

            <footer>
                <ul>
                    <li class="copyright">
                        &copy; 2019-{{ date('Y') }}
                    </li>

                    <li class="source">
                        <a href="https://github.com/michaelvcolianna/moneytracker.colianna.net" target="_blank" rel="noreferrer nofollow" aria-describedby="external-label new-window-label">
                            <span class="label">Source Code</span>
                            <x-shared.icon name="external-link" height="12" width="12" aria-hidden="true" />
                        </a>
                    </li>

                    <li class="branch">
                        <x-shared.icon name="git" />{{ $git['hash'] . ' [' . $git['branch'] . ']' }}
                    </li>
                </ul>
            </footer>
        </div>

        @livewireScripts

        <div hidden>
            <span id="new-window-label">opens in a new window</span>
            <span id="external-label">opens an external site</span>
        </div>
    </body>
</html>
