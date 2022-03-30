<x-layout title="Dashboard">
    <livewire:navigation />
    <livewire:form.update.amount />

    <livewire:form.add.entry />

    <div class="entries__list">
        <div class="legend legend--entries" aria-hidden="true">
            <strong class="legend__amount">Amount</strong>
            <strong class="legend__payee">Payee</strong>
            <strong class="legend__scheduled">Scheduled</strong>
            <strong class="legend__reconciled">Reconciled</strong>
            <strong class="legend__delete">Delete</strong>
        </div>

        <livewire:form.update.entry num="3" amount="10" payee="Disney+" />
        <livewire:form.update.entry num="2" amount="80" payee="Geico" />
        <livewire:form.update.entry num="1" amount="230" payee="Southern CT Gas" />
    </div>

    {{-- @todo Replace with real payees list --}}
    <datalist id="payees-list">
        <option value="Disney+">
        <option value="Geico">
        <option value="Southern CT Gas">
    </datalist>
</x-layout>
