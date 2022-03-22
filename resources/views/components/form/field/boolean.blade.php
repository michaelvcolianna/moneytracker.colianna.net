<div class="field field--boolean field__checkbox">
    <label class="checkbox">
        <input id="{{ $id }}" type="checkbox" {{ $attributes }} />
        <span aria-hidden="true">
            <x-shared.icon name="box-checked" class="checked" />
            <x-shared.icon name="box-unchecked" class="unchecked" />
        </span>
        <span>{{ $label }}</span>
    </label>

    @if($help)
        <span class="field__help">{{ $help }}</span>
    @endif

    @error($id)
        <em role="alert">{{ $message }}
    @enderror
</div>
