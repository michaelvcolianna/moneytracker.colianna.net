<div class="order-1 lg:order-2 w-full lg:w-1/3 px-4 lg:px-0">
    <form wire:submit.prevent="addPayee">
        <div>
            <x-jet-label for="name" value="Name" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')" required />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label for="amount" value="Amount" />
            <x-jet-input id="amount" class="block mt-1 w-full" type="number" step="0.01" wire:model="amount" :value="old('amount')" />
            <x-jet-input-error for="amount" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label for="notes" value="Notes" />
            <x-textarea id="notes" class="block mt-1 w-full h-20 resize-none" wire:model="notes" :value="old('notes')" />
            <x-jet-input-error for="notes" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="schedule" class="flex items-start">
                <x-jet-checkbox id="schedule" wire:model="schedule" />
                <span class="ml-2 text-sm text-gray-600">Auto-schedule</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="bg-blue-600">
                Add Payee
            </x-jet-button>
        </div>
    </form>
</div>
