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
        <span>{{ $areAnySelected ? 'Des' : 'S' }}elect All</span>
    </button>
</div>
