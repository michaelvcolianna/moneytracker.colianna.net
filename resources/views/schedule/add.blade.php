<div class="w-full px-4 lg:px-0">
    @if($pay_periods->count() > 0 && $payees->count() > 0)
        @if($pay_periods->hasPages())
            <div class="mb-4">
                {{ $pay_periods->links() }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            @foreach($pay_periods as $pay_period)
                <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="openPayPeriod({{ $pay_period->id }})">
                    <div class="p-4">
                        <p class="font-bold text-sm">
                            {{ $pay_period->date->format('n/j/Y') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        @if($pay_periods->count() < 1)
            <p class="italic">
                There are no pay periods yet. Please add some.
            </p>
        @endif

        @if($payees->count() < 1)
            <p class="italic">
                There are no payees that can be scheduled. Please add some.
            </p>
        @endif
    @endif

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Schedule Payees for Pay Period:
            <span class="font-bold">{{ $date }}</span>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="schedulePayPeriod" class="max-h-modal overflow-y-scroll">
                <input type="hidden" wire:model="pay_period_id" />

                <p class="text-gray-600">
                    Any payees selected will have their auto-schedule amount
                    applied to this pay period.
                </p>

                @foreach($payees as $payee)
                    <div class="mt-4">
                        <label for="schedule-{{ $payee->id }}" class="flex items-start">
                            <x-jet-checkbox id="schedule-{{ $payee->id }}" wire:model="schedule.{{ $payee->id }}" />
                            <span class="ml-2 text-sm text-gray-600">
                                {{ $payee->name }} ({{ $payee->getPrettyAmount() }})
                            </span>
                        </label>
                    </div>
                @endforeach

                <x-jet-input-error for="schedule" class="mt-2" />

                <button class="hidden" />
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="schedulePayPeriod">
                Schedule
            </x-jet-button>

            <x-jet-secondary-button class="mr-2" wire:click="closePayPeriod">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="added">
        <x-slot name="title">
            Scheduled
        </x-slot>

        <x-slot name="content">
            <p>
                Scheduling complete.
            </p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('added')">
                OK
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
