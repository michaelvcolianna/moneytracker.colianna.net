<div class="field field--input field__{{ $attributes->get('type') }}">
    <label for="{{ $id }}">
        {{ $label }}

        @if($errors->has($id) || $error)
            <em role="alert">{{ !empty($errors->first($id)) ? $errors->first($id) : 'Unknown error'}}</em>
        @endif
    </label>

    <input id="{{ $id }}" {{ $attributes }} />

    @if($help)
        <span class="field__help">{{ $help }}</span>
    @endif
</div>
