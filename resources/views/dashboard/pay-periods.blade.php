<div class="w-1/2 flex flex-row justify-between items-center">
    @if($pay_periods['older'])
        <x-jet-secondary-button wire:click="switchPayPeriod({{ $pay_periods['older']->id }})">
            «
            {{ $pay_periods['older']->date->format('n/j/Y') }}
        </x-jet-secondary-button>
    @else
        <span class="text-gray-400 text-sm italic">No prior date</span>
    @endif

    <div class="font-bold">
        {{ $pay_periods['current']->date->format('Y-m-d') }}
    </div>

    @if($pay_periods['newer'])
        <x-jet-secondary-button wire:click="switchPayPeriod({{ $pay_periods['newer']->id }})">
            {{ $pay_periods['newer']->date->format('n/j/Y') }}
            »
        </x-jet-secondary-button>
    @else
        <span class="text-gray-400 text-sm italic">No later date</span>
    @endif
</div>
