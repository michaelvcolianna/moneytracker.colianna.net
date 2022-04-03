<div class="page__pay-periods__add">
    <x-form.hidden title="Add Pay Period">
        <x-form.field.input
            id="start"
            type="date"
            wire:model.defer="payPeriod.start"
        >
            Starting Date
        </x-form.field.input>

        <x-form.field.input
            id="amount"
            type="number"
            wire:model.defer="payPeriod.amount"
        >
            Amount
        </x-form.field.input>

        <x-shared.save-button>
            Pay Period
        </x-shared.save-button>
    </x-form.hidden>
</div>
