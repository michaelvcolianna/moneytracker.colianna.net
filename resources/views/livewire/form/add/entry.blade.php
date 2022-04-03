<div class="page__dashboard__add">
    <form class="form" wire:submit.prevent="save">
        <h3 class="form__toggle">
            Add Entry
        </h3>

        <div class="form__interior">
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

            @include('partials.button.save', ['label' => 'Entry'])
        </div>
    </form>
</div>
