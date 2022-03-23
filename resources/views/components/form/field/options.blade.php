<div class="field field--options field__{{ $type }}">
    <span class="label">
        {{ $label }}

        @if($help)
            <span class="field__help">{{ $help }}</span>
        @endif
    </span>

    @foreach($options as $key => $option)
        <x-form.field.boolean id="{{ $id }}-{{ $key }}" :label="$option" />
    @endforeach

    <button type="button" class="select-all {{ $areAnySelected ? '' : 'empty' }}" wire:click="selectAll">
        <span class="label">Select All</span>
        <span aria-hidden="true">
            <x-shared.icon name="box-select-all" class="on" />
            <x-shared.icon name="box-deselect-all" class="off" />
        </span>
    </button>
</div>
