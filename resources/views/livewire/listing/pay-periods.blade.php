<div class="block block__listing">
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
