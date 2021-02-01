<div class="my-8 max-w-sm">
    <h3 class="font-semibold text-gray-800 leading-tight">
        Add New
    </h3>

    <form wire:submit.prevent="addPayee" class="mt-4">
        @csrf

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
            <label for="schedule" class="flex items-start">
                <x-jet-checkbox id="schedule" wire:model="schedule" />
                <span class="ml-2 text-sm text-gray-600">Auto-schedule</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="bg-blue-600">
                Add
            </x-jet-button>
        </div>
    </form>
</div>
