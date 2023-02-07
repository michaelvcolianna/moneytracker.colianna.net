<div class="forecast">
    <div class="header">
        <span>Forecast</span>
        <span>(Next 10 Paydays)</span>
    </div>

    <ul>
        @foreach($paydays as $payday)
            <livewire:single-payday
                key="payday-{{ $payday->id }}"
                :payday="$payday"
            />
        @endforeach
    </ul>
</div>
