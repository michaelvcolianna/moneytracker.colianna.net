<footer x-data>
    <div>
        &copy; {{ $copyright }} by

        <x-shared.link href="https://github.com/michaelvcolianna" label="MVC" />

        <x-shared.link
            href="https://github.com/michaelvcolianna/moneytracker.colianna.net"
            label="View source"
        />

        @auth
            <x-shared.link
                :href="route('logout')"
                label="Logout"
                @click.prevent="$refs.logout.submit()"
            />

            <form
                hidden
                method="POST"
                action="{{ route('logout') }}"
                x-ref="logout"
            >
                @csrf
            </form>
        @endauth
    </div>
</footer>
