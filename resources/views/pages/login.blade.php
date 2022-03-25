<x-layout title="Log In">
    <form class="login__form" method="POST" action="{{ route('login') }}">
        @csrf

        <x-form.field.input id="email" name="email" type="text" autocomplete="nickname" />
        <x-form.field.input id="password" name="password" type="password" />
        <x-form.field.boolean id="remember" label="Remember Me" name="remember" />
        <x-form.field.button id="submit" label="Log In" icon="log-in" type="submit" class="primary" />
    </form>
</x-layout>
