@auth
    <nav aria-label="Areas">
        <x-shared.nav-link route="dashboard" icon="pie-chart">
            Dashboard
        </x-shared.nav-link>

        <x-shared.nav-link route="forecast" icon="cast">
            Forecast
        </x-shared.nav-link>

        <x-shared.nav-link route="payees" icon="server">
            Payees
        </x-shared.nav-link>

        <x-shared.nav-link route="pay-periods" icon="calendar">
            Pay Periods
        </x-shared.nav-link>

        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-shared.nav-link
                route="logout"
                icon="log-out"
                @click.prevent="$root.submit();"
            >
                Log Out
            </x-shared.nav-link>
        </form>
    </nav>
@endauth
