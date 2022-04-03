@auth
    <nav aria-label="Areas">
        <x-shared.nav-link route="dashboard" icon="pie-chart">
            Dashboard
        </x-shared.nav-link>

        {{-- @todo pay dates icon calendar --}}

        <x-shared.nav-link route="pay-periods" icon="server">
            Pay Periods
        </x-shared.nav-link>

        <x-shared.nav-link route="payees" icon="grid">
            Payees
        </x-shared.nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-shared.nav-link
                route="logout"
                icon="log-out"
                onclick="event.preventDefault(); this.closest('form').submit();"
            >
                Log Out
            </x-shared.nav-link>
        </form>
    </nav>
@endauth
