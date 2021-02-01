<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pay Period {{ $date }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-sm">
                <form wire:submit.prevent="updatePayPeriod">
                    @csrf

                    <x-jet-input type="hidden" wire:model="pay_period_id" :value="old('pay_period_id')" />

                    <div class="mt-4">
                        <x-jet-label for="start" value="Starting amount" />
                        <x-jet-input id="start" class="block mt-1 w-full" type="number" step="0.01" wire:model="start" :value="old('start')" required />
                        <x-jet-input-error for="start" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button>
                            Update
                        </x-jet-button>
                    </div>
                </form>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button wire:click="finishEdit">
                        Cancel
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
</div>
