<div class="payees__add">
    <x-form.field.button id="submit" label="Add Payee" icon="&#10010;" wire:click="$toggle('isFormShowing')" />

    @if($isFormShowing)
        <div class="payees__add__form">
            <x-form.field.boolean id="new-active" label="Active" checked />
            <x-form.field.input id="new-name" label="Name" type="text" />
            <x-form.field.input id="new-amount" label="Schedule Amount" type="number" step="0.01" />
            <x-form.field.options id="new-month" label="Schedule Months" type="months" :options="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']" />
            <x-form.field.input id="new-start" label="Schedule Start Day" type="number" step="1" min="1" max="31" />
            <x-form.field.input id="new-end" label="Schedule End Day" type="number" step="1" min="1" max="31" />
            <x-form.field.button id="add" label="Save New Payee" icon="&#10095;" />
            <x-form.field.button id="cancel" type="reset" wire:click="clearForm" />
        </div>
    @endif
</div>
