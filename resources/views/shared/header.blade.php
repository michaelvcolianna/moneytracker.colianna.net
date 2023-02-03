<header>
    <x-shared.nav-link route="home" label="MoneyTracker" />

    @auth
        <nav>
            <x-shared.nav-link route="entries" label="Entries" />
            <x-shared.nav-link route="forecast" label="Forecast" />
            <x-shared.nav-link route="payees" label="Payees" />
        </nav>
    @endauth
</header>
