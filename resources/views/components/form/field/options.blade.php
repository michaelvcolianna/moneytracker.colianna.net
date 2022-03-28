<div class="field field--options field__{{ $type }}">
    <span class="label">
        {{ $label }}

        @if($help)
            <span class="field__help">{{ $help }}</span>
        @endif
    </span>

    <div class="options">
        @foreach($options as $key => $option)
            <x-form.field.boolean id="{{ $id }}-{{ $key }}" :label="$option" wire:model="{{ $key }}" />
        @endforeach
    </div>

    <button type="button" class="select-all {{ $areAnySelected ? '' : 'empty' }}" wire:click="selectAll">
        <span class="label">{{ $areAnySelected ? 'Des' : 'S' }}elect All</span>
        <span aria-hidden="true">
            <x-shared.icon name="box-select-all" class="on" height="14" width="14" />
            <x-shared.icon name="box-deselect-all" class="off" height="14" width="14" />
        </span>
    </button>
</div>
