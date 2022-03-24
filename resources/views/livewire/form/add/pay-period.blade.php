<div class="pay-periods__add">
    @include('partials.button.toggle', ['label' => 'Period'])

    @if($isFormShowing)
        <div class="pay-periods__add__form">
            <h3>Add Pay Period</h3>

            <x-form.field.input id="new-date" label="Starting Date" type="date" />
            <x-form.field.input id="new-amount" label="Amount" type="number" step="0.01" />
            <x-form.field.boolean id="new-biweekly" label="Biweekly" />
            @include('partials.button.save', ['label' => 'Period'])
        </div>
    @endif
</div>
