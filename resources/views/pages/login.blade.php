<x-layout>
    <form class="login" method="POST" action="{{ route('login') }}">
        @csrf

        <x-shared.errors />

        <div class="field">
            <label for="email">Email</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="email"
            >
        </div>

        <div class="field">
            <label for="password">Password</label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            >
        </div>

        <div class="field checkbox">
            <label for="remember">
                <input id="remember" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div class="field button">
            <button class="primary" type="submit">Log in</button>
        </div>
    </form>
</x-layout>
