<div class="page__pay-periods__add">
    <form class="form" wire:submit.prevent="save">
        <h3 class="form__toggle">
            Add Pay Period
        </h3>

        <div class="form__interior">
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

            @include('partials.button.save', ['label' => 'Pay Period'])
        </div>
    </form>
</div>
