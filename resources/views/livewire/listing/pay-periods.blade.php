<div class="pay-periods__list">
    <div class="legend legend--pay-periods" aria-hidden="true">
        <strong class="legend__date">Starting Date</strong>
        <strong class="legend__amount">Amount</strong>
        <strong class="legend__biweekly">Biweekly</strong>
    </div>

    @forelse($payPeriods as $payPeriod)
        <livewire:form.update.pay-period :payPeriod="$payPeriod" wire:key="pay-period-{{ $payPeriod->id }}" />
    @empty
        <div class="empty">
            <p><em>No pay periods yet.</em></p>
        </div>
    @endforelse
</div>
