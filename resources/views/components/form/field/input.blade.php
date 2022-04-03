<div class="form__{{ $attributes['type'] }} field__{{ $attributes['id'] }}">
    <label for="{{ $attributes['id'] }}">
        {{ $slot }}
    </label>

    <input {{ $attributes }} />
</div>
