<div class="entry" id="entry-{{ $num }}" aria-label="Entry">
    <x-form.field.input id="entry-{{ $num }}-amount" label="Amount" type="number" step="0.01" value="{{ $amount }}" />
    <x-form.field.input id="entry-{{ $num }}-payee" label="Payee" type="text" value="{{ $payee }}" />
    <x-form.field.boolean id="entry-{{ $num }}-scheduled" label="Scheduled" />
    <x-form.field.boolean id="entry-{{ $num }}-reconciled" label="Reconciled" />
    <x-form.field.button id="delete" label="Delete Entry" icon="&#10006;" />
</div>
