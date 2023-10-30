<header @class(['auth' => auth()->check()])>
    <div class="branding">
        <a href="/">MoneyTracker</a>
        <livewire:theme-switcher />
    </div>

    @auth
        <nav>
            <x-shared.nav-link route="entries" label="Entries" />
            <x-shared.nav-link route="forecast" label="Forecast" />
            <x-shared.nav-link route="payees" label="Payees" />
        </nav>
    @endauth
</header>
