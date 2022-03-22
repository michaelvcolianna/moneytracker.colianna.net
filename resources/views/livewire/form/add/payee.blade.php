<div class="payees__add">
    @include('partials.button.toggle', ['label' => 'Payee'])

    @if($isFormShowing)
        <div class="payees__add__form">
            <x-form.field.boolean id="new-active" label="Active" checked />
            <x-form.field.input id="new-name" label="Name" type="text" />
            <x-form.field.input id="new-amount" label="Schedule Amount" type="number" step="0.01" />
            <x-form.field.options id="new-month" label="Schedule Months" type="months" :options="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']" :areAnySelected="$areAnySelected" />
            <x-form.field.input id="new-start" label="Schedule Start Day" type="number" step="1" min="1" max="31" />
            <x-form.field.input id="new-end" label="Schedule End Day" type="number" step="1" min="1" max="31" />
            @include('partials.button.save', ['label' => 'Payee'])
        </div>
    @endif
</div>
