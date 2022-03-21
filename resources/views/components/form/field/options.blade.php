<div class="field field--options field__{{ $type }}">
    <span class="label">{{ $label }}</span>

    @foreach($options as $key => $option)
        <x-form.field.boolean id="{{ $id }}-{{ $key }}" :label="$option" />
    @endforeach

    <x-form.field.button id="check-all" class="check-all" label="Select All" icon="&#10033;" />
</div>
