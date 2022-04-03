<div class="page__pay-periods__list">
    <h3>
        Current Pay Periods
    </h3>

    @foreach($payPeriods as $payPeriod)
        <livewire:form.update.pay-period
            :payPeriod="$payPeriod"
            wire:key="pay-period-{{ $payPeriod->id }}"
        />
    @endforeach
</div>
