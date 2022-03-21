<x-layout title="Payees">
    <livewire:form.add.payee />

    <div class="payees__list">
        <div class="legend legend--payees" aria-hidden="true">
            <strong class="legend__active">Active</strong>
            <strong class="legend__name">Name</strong>
            <strong class="legend__amount">Schedule Amount</strong>
            <strong class="legend__months">Schedule Months</strong>
            <strong class="legend__start">Schedule Start Day</strong>
            <strong class="legend__end">Schedule End Day</strong>
        </div>

        <livewire:form.update.payee num="3" name="Stop & Shop" />
        <livewire:form.update.payee num="2" name="GoNetspeed" amount="80" start="20" />
        <livewire:form.update.payee num="1" name="Disney+" amount="10" start="16" end="20" />
    </div>
</x-layout>
