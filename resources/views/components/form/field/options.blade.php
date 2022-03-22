<div class="field field--options field__{{ $type }}">
    <span class="label">{{ $label }}</span>

    @foreach($options as $key => $option)
        <x-form.field.boolean id="{{ $id }}-{{ $key }}" :label="$option" />
    @endforeach

    <button type="button" class="select-all {{ $areAnySelected ? '' : 'empty' }}" wire:click="selectAll">
        <span class="label">elect All</span>
        <span aria-hidden="true">
            <x-shared.icon name="box-select-all" class="on" />
            <x-shared.icon name="box-deselect-all" class="off" />
        </span>
    </button>
</div>
