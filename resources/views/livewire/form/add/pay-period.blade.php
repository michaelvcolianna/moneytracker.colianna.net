<div class="payperiods__add">
    <x-form.field.button id="submit" label="Add Pay Period" icon="&#10010;" wire:click="$toggle('isFormShowing')" />

    @if($isFormShowing)
        <div class="payperiods__add__form">
            <x-form.field.input id="new-date" label="Starting Date" type="date" />
            <x-form.field.input id="new-amount" label="Amount" type="number" step="0.01" />
            <x-form.field.boolean id="new-biweekly" label="Biweekly" />
            <x-form.field.button id="add" label="Save New Pay Period" icon="&#10095;" />
        </div>
    @endif
</div>
