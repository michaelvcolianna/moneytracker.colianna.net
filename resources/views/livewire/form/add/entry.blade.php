<div class="entries__add">
    @include('partials.button.toggle', ['label' => 'New Entry'])

    @if($isFormShowing)
        <div class="entries__add__form">
            <h3>Add Entry</h3>

            <x-form.field.input id="new-amount" label="Amount" type="number" step="0.01" wire:model.lazy="amount" />
            <x-form.field.input id="new-payee" label="Payee" type="list" list="payees-list" wire:model.lazy="payee" />
            <x-form.field.boolean id="new-scheduled" label="Scheduled" wire:model="scheduled" />
            <x-form.field.boolean id="new-reconciled" label="Reconciled" wire:model="reconciled" />

            @include('partials.button.save', ['label' => 'Payee'])
        </div>
    @endif
</div>
