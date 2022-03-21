<div class="field field--input field__{{ $attributes->get('type') }}">
    <label for="{{ $id }}">{{ $label }}</label>

    <input id="{{ $id }}" {{ $attributes }} />

    @if($help)
        <span class="field__help">{{ $help }}</span>
    @endif

    @error($id)
        <em role="alert">{{ $message }}
    @enderror
</div>
