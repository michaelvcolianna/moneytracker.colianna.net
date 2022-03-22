<x-layout title="Log In">
    <div class="login__form">
        <x-form.field.input id="username" type="text" autocomplete="nickname" />
        <x-form.field.input id="password" type="password" />
        <x-form.field.boolean id="remember" label="Remember Me" />
        <x-form.field.button id="submit" label="Log In" icon="log-in" class="primary" />
    </div>
</x-layout>
