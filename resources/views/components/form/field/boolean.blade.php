<div class="field field--boolean field__{{ $id }}">
    <label>
        <input id="{{ $id }}" type="checkbox" {{ $attributes }} />
        <span>{{ $label }}</span>
    </label>

    @if($help)
        <span class="field__help">{{ $help }}</span>
    @endif

    @error($id)
        <em role="alert">{{ $message }}
    @enderror
</div>
