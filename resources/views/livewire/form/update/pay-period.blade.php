<div class="pay-period" id="pay-period-{{ $num }}" aria-label="Pay period">
    <x-form.field.input id="pay-period-{{ $num }}-date" label="Starting Date" type="date" value="{{ $date }}" />
    <x-form.field.input id="pay-period-{{ $num }}-amount" label="Amount" type="number" step="0.01" value="{{ $amount }}" />
    <x-form.field.boolean id="pay-period-{{ $num }}-biweeky" label="Biweekly" />
</div>
