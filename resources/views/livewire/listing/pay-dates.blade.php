<div class="block block__listing">
    <h3>
        Next 10 Pay Dates
    </h3>

    @foreach($payDates as $payDate)
        <livewire:form.update.pay-date :payDate="$payDate" />
    @endforeach
</div>
