<div class="entries__add">
    <x-form.field.button id="submit" label="Add Entry" icon="&#10010;" wire:click="$toggle('isFormShowing')" />

    @if($isFormShowing)
        <div class="entries__add__form">
            <x-form.field.input id="new-amount" label="Amount" type="number" step="0.01" />
            <x-form.field.input id="new-payee" label="Payee" type="text" />
            <x-form.field.boolean id="new-scheduled" label="Scheduled" />
            <x-form.field.boolean id="new-reconciled" label="Reconciled" />
            <x-form.field.button id="add" label="Save New Entry" icon="&#10095;" />
            <x-form.field.button id="cancel" type="reset" wire:click="clearForm" />
        </div>
    @endif
</div>
