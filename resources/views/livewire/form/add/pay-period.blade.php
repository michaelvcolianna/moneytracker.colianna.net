<div class="payperiods__add">
    @include('partials.button.toggle', ['label' => 'Pay Period'])

    @if($isFormShowing)
        <div class="payperiods__add__form">
            <x-form.field.input id="new-date" label="Starting Date" type="date" />
            <x-form.field.input id="new-amount" label="Amount" type="number" step="0.01" />
            <x-form.field.boolean id="new-biweekly" label="Biweekly" />
            @include('partials.button.save', ['label' => 'Pay Period'])
        </div>
    @endif
</div>
