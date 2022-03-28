<div class="payees__list">
    <div class="legend legend--payees" aria-hidden="true">
        <strong class="legend__active">Active</strong>
        <strong class="legend__name">Name</strong>
        <strong class="legend__amount">Schedule Amount</strong>
        <strong class="legend__months">Schedule Months</strong>
        <strong class="legend__start">Schedule Start Day</strong>
        <strong class="legend__end">Schedule End Day</strong>
    </div>

    @forelse($payees as $payee)
        <livewire:form.update.payee :payee="$payee" wire:key="payee-{{ $payee->id }}" />
    @empty
        <div class="empty">
            <p><em>No payees yet.</em></p>
        </div>
    @endforelse
</div>
