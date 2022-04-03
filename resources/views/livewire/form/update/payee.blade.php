<div class="payee" id="{{ $fieldId }}" aria-label="Payee">
    <x-form.field.boolean
        id="{{ $fieldId }}-active"
        wire:model="payee.active"
    >
        Active for autocomplete
    </x-form.field.boolean>

    <x-form.field.input
        id="{{ $fieldId }}-name"
        type="text"
        wire:model.lazy="payee.name"
    >
        Name
    </x-form.field.input>

    <x-form.field.input
        id="{{ $fieldId }}-amount"
        type="number"
        wire:model.lazy="payee.amount"
    >
        Scheduled Amount
    </x-form.field.input>

    <x-form.field.input
        id="{{ $fieldId }}-start"
        type="number"
        min="1" max="31"
        wire:model.lazy="payee.start"
    >
        Schduled Start Day
    </x-form.field.input>

    <x-form.field.input
        id="{{ $fieldId }}-end"
        type="number"
        min="1" max="31"
        wire:model.lazy="payee.end"
    >
        Scheduled End Day
    </x-form.field.input>

    <div class="form__options field__months">
        <div class="options__info">
            <h4>
                Scheduled Months
            </h4>

            <button
                type="button"
                class="select-all {{ $areAnySelected ? '' : 'empty' }}"
                wire:click="selectAll"
            >
                <span>
                    {{ $areAnySelected ? 'Des' : 'S' }}elect All
                </span>
            </button>
        </div>

        <div class="options__items">
            @foreach($options as $key => $name)
                <x-form.field.boolean
                    id="{{ $fieldId }}-month-{{ $key }}"
                    wire:model="payee.{{ $key }}"
                    wire:key="{{ $fieldId }}-month-{{ $key }}"
                >
                    {{ $name }}
                </x-form.field.boolean>
            @endforeach
        </div>
    </div>
</div>
