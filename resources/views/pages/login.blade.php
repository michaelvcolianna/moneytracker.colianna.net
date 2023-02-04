<x-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <x-shared.errors />

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
        </div>

        <div>
            <label for="remember">
                <input id="remember" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div>
            <button type="submit">Log in</button>
        </div>
    </form>
</x-layout>
