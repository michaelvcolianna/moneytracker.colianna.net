<div class="form__fields">
    <x-form.field.input
        id="{{ $prefix }}amount"
        type="number"
        wire:model.lazy="entry.amount"
    >
        Amount
    </x-form.field.input>

    <x-form.field.input
        id="{{ $prefix }}payee"
        type="list"
        list="payees-list"
        wire:model.lazy="entry.payee"
    >
        Payee
    </x-form.field.input>

    <x-form.field.boolean
        id="{{ $prefix }}scheduled"
        wire:model="entry.scheduled"
    >
        Scheduled
    </x-form.field.boolean>

    <x-form.field.boolean
        id="{{ $prefix }}reconciled"
        wire:model="entry.reconciled"
    >
        Reconciled
    </x-form.field.boolean>
</div>
