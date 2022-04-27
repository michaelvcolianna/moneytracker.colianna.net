<div class="form__fields">
    <x-form.field.input
        id="{{ $prefix }}name"
        type="text"
        wire:model.lazy="payee.name"
    >
        Name
    </x-form.field.input>

    <x-form.field.input
        id="{{ $prefix }}amount"
        type="number"
        wire:model.lazy="payee.amount"
    >
        Amount
    </x-form.field.input>

    <x-form.field.input
        id="{{ $prefix }}start"
        type="number"
        min="1" max="31"
        wire:model.lazy="payee.start"
    >
        Start Day
    </x-form.field.input>

    <x-form.field.input
        id="{{ $prefix }}end"
        type="number"
        min="1" max="31"
        wire:model.lazy="payee.end"
    >
        End Day
    </x-form.field.input>

    <x-form.field.boolean
        id="{{ $prefix }}auto"
        wire:model="payee.auto"
    >
        Auto-schedule
    </x-form.field.boolean>
</div>
