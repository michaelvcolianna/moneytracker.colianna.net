<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Payee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-sm">
                <form wire:submit.prevent="updatePayee">
                    @csrf

                    <x-jet-input type="hidden" wire:model="payee_id" :value="old('payee_id')" />

                    <div>
                        <x-jet-label for="name" value="Name" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')" required />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="amount" value="Standard amount" />
                        <x-jet-input id="amount" class="block mt-1 w-full" type="number" wire:model="amount" :value="old('amount')" />
                        <x-jet-input-error for="amount" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="schedule" class="flex items-start">
                            <x-jet-checkbox id="schedule" wire:model="schedule" />
                            <span class="ml-2 text-sm text-gray-600">Auto-schedule</span>
                        </label>
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
