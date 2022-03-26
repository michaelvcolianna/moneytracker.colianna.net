<div class="field field--input field__{{ $attributes->get('type') }}">
    <label for="{{ $id }}">
        {{ $label }}

        @error($test)
            <em role="alert">{{ $message }}</em>
        @enderror
    </label>

    <input id="{{ $id }}" {{ $attributes }} />

    @if($help)
        <span class="field__help">{{ $help }}</span>
    @endif
</div>
