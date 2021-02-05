<div class="order-2 lg:order-1 w-full lg:w-1/2 px-4 lg:px-0 mt-8 lg:mt-0">
    @if($pay_periods->count() < 1)
        <p class="italic">
            There are no pay periods yet. Please add some.
        </p>
    @else
        @if($pay_periods->hasPages())
            <div class="mb-4">
                {{ $pay_periods->links() }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            @foreach($pay_periods as $pay_period)
                <div class="bg-white cursor-pointer rounded shadow transform transition-transform hover:scale-105">
                    <div class="p-4" wire:click="switchPayPeriod({{ $pay_period->id }})">
                        <p class="font-bold text-sm">
                            {{ $pay_period->date->format('n/j/Y') }}
                        </p>

                        <p class="font-thin text-3xl">
                            {{ $pay_period->getPrettyCurrent() }}
                        </p>

                        <p class="text-xs font-bold text-gray-500">
                            of {{ $pay_period->getPrettyStart() }}
                        </p>
                    </div>

                    <div class="px-4 py-2 text-sm text-blue-600 border-t border-gray-200" wire:click="openPayPeriod({{ $pay_period->id }})">
                        Edit
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Edit Pay Period:
            <span class="font-bold">{{ $date }}</span>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updatePayPeriod">
                <input type="hidden" wire:model="pay_period_id" />

                <div>
                    <x-jet-label for="start">
                        Starting amount
                        <span class="ml-4 text-xs text-gray-400">(Defaults to $2,000 if left blank)</span>
                    </x-jet-label>
                    <x-jet-input id="edit-pay-period-start" class="block mt-1 w-full" type="number" step="0.01" wire:model="start" :value="old('start')" />
                    <x-jet-input-error for="start" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="delete" class="flex items-start">
                        <x-jet-checkbox id="delete" wire:click="$toggle('delete')" />
                        <span class="ml-2 text-sm text-gray-600">Delete</span>
                    </label>
                </div>

                <button class="hidden" />
            </form>
        </x-slot>

        <x-slot name="footer">
            @if($delete)
                <x-jet-danger-button class="mr-2" wire:click="deletePayPeriod">
                    Delete
                </x-jet-danger-button>
            @endif

            <x-jet-button wire:click="updatePayPeriod">
                Update
            </x-jet-button>

            <x-jet-secondary-button class="mr-2" wire:click="closePayPeriod">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
