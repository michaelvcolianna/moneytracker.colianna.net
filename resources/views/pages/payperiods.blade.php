<x-layout title="Pay Periods">
    <livewire:form.add.pay-period />

    <div class="payperiods__list">
        <div class="legend legend--payperiods" aria-hidden="true">
            <strong class="legend__date">Starting Date</strong>
            <strong class="legend__amount">Amount</strong>
            <strong class="legend__biweekly">Biweekly</strong>
        </div>

        <div class="payperiod" id="payperiod-1" aria-label="Pay period">
            <x-form.field.input id="payperiod-1-date" label="Starting Date" type="date" value="2022-01-07" />
            <x-form.field.input id="payperiod-1-amount" label="Amount" type="number" step="0.01" value="2000" />
            <x-form.field.boolean id="payperiod-1-biweeky" label="Biweekly" checked />
        </div>
    </div>
</x-layout>
