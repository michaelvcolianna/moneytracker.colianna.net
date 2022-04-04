<x-layout title="Log In">
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <x-form.field.input id="email" type="text">
            Email Address
        </x-form.field.input>

        <x-form.field.input id="password" type="password">
            Password
        </x-form.field.input>

        <x-form.field.boolean id="remember">
            Remember Me
        </x-form.field.boolean>

        <x-form.field.button icon="log-in" class="button button--primary">
            Log In
        </x-form.field.button>
    </form>
</x-layout>
