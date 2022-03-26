<div class="pay-periods__add">
    @include('partials.button.toggle', ['label' => 'Period'])

    @if($isFormShowing)
        <div class="pay-periods__add__form">
            <h3>Add Pay Period</h3>

            <x-form.field.input id="new-date" test="started_at" label="Starting Date" type="date" wire:model.defer="started_at" />
            <x-form.field.input id="new-amount" test="amount" label="Amount" type="number" step="0.01" wire:model.defer="amount" />
            <x-form.field.boolean id="new-biweekly" test="biweekly" label="Biweekly" wire:model.defer="biweekly" />

            @include('partials.button.save', ['label' => 'Period'])
        </div>
    @endif
</div>
