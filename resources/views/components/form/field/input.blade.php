<div class="field field--input field__{{ $id }}">
    <label for="{{ $id }}">{{ $label }}</label>

    <input id="{{ $id }}" {{ $attributes->merge(['type' => 'text']) }} />

    @if($help)
        <span class="field__help">{{ $help }}</span>
    @endif

    @error($id)
        <em role="alert">{{ $message }}
    @enderror
</div>
