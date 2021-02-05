<div class="order-1 lg:order-2 w-full lg:w-1/3 px-4 lg:px-0">
    <form wire:submit.prevent="addPayPeriod">
        <div>
            <x-jet-label for="date" value="Date" />
            <x-jet-input id="date" class="block mt-1 w-full" type="date" wire:model="date" :value="old('date')" required />
            <x-jet-input-error for="date" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label for="start">
                Starting amount
                <span class="ml-4 text-xs text-gray-400">(Defaults to $2,000 if left blank)</span>
            </x-jet-label>
            <x-jet-input id="start" class="block mt-1 w-full" type="number" step="0.01" wire:model="start" :value="old('start')" />
            <x-jet-input-error for="start" class="mt-2" />
        </div>

        <div class="mt-4 overflow-y-scroll max-h-modal">
            <x-jet-label for="schedule" value="Auto-schedule payees" />

            @foreach($payees as $payee)
                <div class="mt-4">
                    <label for="schedule-{{ $payee->id }}" class="flex items-center">
                        <x-jet-checkbox id="schedule-{{ $payee->id }}" wire:model="schedule.{{ $payee->id }}" />
                        <span class="ml-2 text-sm text-gray-600">
                            {{ $payee->name }}
                            <span class="block text-xs">{{ $payee->notes ?? 'n/a' }}</span>
                        </span>
                    </label>
                </div>
            @endforeach

            <x-jet-input-error for="schedule" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="bg-blue-600">
                Add Pay Period
            </x-jet-button>
        </div>
    </form>
</div>
