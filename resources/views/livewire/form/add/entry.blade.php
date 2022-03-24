<div class="entries__add">
    @include('partials.button.toggle', ['label' => 'New Entry'])

    @if($isFormShowing)
        <div class="entries__add__form">
            <h3>Add Entry</h3>

            <x-form.field.input id="new-amount" label="Amount" type="number" step="0.01" />
            <x-form.field.input id="new-payee" label="Payee" type="text" />
            <x-form.field.boolean id="new-scheduled" label="Scheduled" />
            <x-form.field.boolean id="new-reconciled" label="Reconciled" />

            @include('partials.button.save', ['label' => 'Payee'])
        </div>
    @endif
</div>
