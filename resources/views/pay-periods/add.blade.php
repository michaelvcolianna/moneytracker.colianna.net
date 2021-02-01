<div class="my-8 max-w-sm">
    <h3 class="font-semibold text-gray-800 leading-tight">
        Add New
    </h3>

    <form wire:submit.prevent="addPayPeriod" class="mt-4">
        @csrf

        <div>
            <x-jet-label for="date" value="Date" />
            <x-jet-input id="date" class="block mt-1 w-full" type="date" wire:model="date" :value="old('date')" required />
            <x-jet-input-error for="date" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label for="start" value="Starting amount" />
            <x-jet-input id="start" class="block mt-1 w-full" type="number" step="0.01" wire:model="start" :value="old('start')" required />
            <x-jet-input-error for="start" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="bg-blue-600">
                Add
            </x-jet-button>
        </div>
    </form>
</div>
