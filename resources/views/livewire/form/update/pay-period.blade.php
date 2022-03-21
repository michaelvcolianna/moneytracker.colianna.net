<div class="payperiod" id="payperiod-{{ $num }}" aria-label="Pay period">
    <x-form.field.input id="payperiod-{{ $num }}-date" label="Starting Date" type="date" value="{{ $date }}" />
    <x-form.field.input id="payperiod-{{ $num }}-amount" label="Amount" type="number" step="0.01" value="{{ $amount }}" />
    <x-form.field.boolean id="payperiod-{{ $num }}-biweeky" label="Biweekly" />
</div>
