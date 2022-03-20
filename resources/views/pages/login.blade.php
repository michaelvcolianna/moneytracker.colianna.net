<x-layout title="Log In">
    <div class="login__form">
        <div class="field field--input field__username">
            <label for="username">Username</label>
            <input id="username" type="text" autocomplete="nickname" />
            @if($errors)
                <em role="alert">Error message.</em>
            @endif
        </div>

        <div class="field field--input field__password">
            <label for="password">Password</label>
            <input id="password" type="password" />
            @if($errors)
                <em role="alert">Error message.</em>
            @endif
        </div>

        <div class="field field--boolean field__remember">
            <label>
                <input id="remember" type="checkbox" />
                <span>Remember Me</span>
            </label>
        </div>

        <div class="button button--submit">
            <button type="button">
                <strong>Log In</strong>
                <span aria-hidden="true">&#10095;</span>
            </button>
        </div>
    </div>
</x-layout>
