<div
    class="form__{{ $attributes['type'] }} field field__{{ $attributes['id'] }}"
>
    <label for="{{ $attributes['id'] }}">
        {{ $slot }}
    </label>

    <input {{ $attributes }} />
</div>
