<div class="page__dashboard__add">
    <x-form.hidden title="Add Entry">
        <x-form.field.input
            id="amount"
            type="number"
            wire:model.lazy="entry.amount"
        >
            Amount
        </x-form.field.input>

        <x-form.field.input
            id="payee"
            type="list"
            list="payees-list"
            wire:model.lazy="entry.payee"
        />

        <x-form.field.boolean
            id="scheduled"
            wire:model="entry.scheduled"
        >
            Scheduled
        </x-form.field.boolean>

        <x-form.field.boolean
            id="reconciled"
            wire:model="entry.reconciled"
        >
            Reconciled
        </x-form.field.boolean>

        <x-shared.save-button>
            Entry
        </x-shared.save-button>
    </x-form.hidden>
</div>
