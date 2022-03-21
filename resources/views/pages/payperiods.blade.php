<x-layout title="Pay Periods">
    <livewire:form.add.pay-period />

    <div class="payperiods__list">
        <div class="legend legend--payperiods" aria-hidden="true">
            <strong class="legend__date">Starting Date</strong>
            <strong class="legend__amount">Amount</strong>
            <strong class="legend__biweekly">Biweekly</strong>
        </div>

        <livewire:form.update.pay-period num="3" date="2022-01-07" amount="2000" />
        <livewire:form.update.pay-period num="2" date="2021-01-08" amount="1500" />
        <livewire:form.update.pay-period num="1" date="2020-01-10" amount="1000" />
    </div>
</x-layout>
