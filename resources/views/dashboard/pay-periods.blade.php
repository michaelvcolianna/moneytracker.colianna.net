<div>
    <h3 class="font-semibold text-gray-800 leading-tight">
        Upcoming Pay Periods
    </h3>

    <div class="grid grid-cols-2 gap-4 mt-4">
        @foreach($pay_periods as $pay_period)
            <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="switchPayPeriod({{ $pay_period->id }})">
                <div class="p-4">
                    <p class="font-thin text-3xl">
                        {{ $pay_period->getPrettyCurrent() }}
                    </p>

                    <p class="text-gray-500 font-bold text-sm">
                        {{ $pay_period->date->format('n/j/Y') }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
