<div class="w-1/12">
    <button wire:click="openModal" class="cursor-pointer mt-4 transform transition-transform hover:scale-110" type="button">
        @include('plus')
    </button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Add Entry to {{ $date }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="addEntry">
                <div>
                    <x-jet-label for="new-amount" value="Amount" />
                    <x-jet-input id="new-amount" class="block mt-1 w-full" type="number" step="0.01" wire:model="amount" :value="old('amount')" required />
                    <x-jet-input-error for="new_amount" class="mt-2" />
                </div>

                @if($payees->count() > 0)
                    <div class="mt-4">
                        <x-jet-label for="new-payee" value="Payee" />
                        <select id="new-payee" wire:model="payee_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value>-- Choose --</option>
                            @foreach($payees as $payee)
                                <option value="{{ $payee->id }}">{{ $payee->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="payee_id" class="mt-2" />
                    </div>
                @endif

                <div class="mt-4">
                    <x-jet-label for="new-name">
                        Name
                        @if($payees->count() > 0)
                            <span class="ml-4 text-xs text-gray-400">(Only used if payee isn't selected)</span>
                        @endif
                    </x-jet-label>
                    <x-jet-input id="new-name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('amount')" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="new-scheduled" class="flex items-start">
                        <x-jet-checkbox id="new-scheduled" wire:model="scheduled" />
                        <span class="ml-2 text-sm text-gray-600">Scheduled</span>
                    </label>
                </div>

                <div class="mt-4">
                    <label for="new-reconciled" class="flex items-start">
                        <x-jet-checkbox id="new-reconciled" wire:model="reconciled" />
                        <span class="ml-2 text-sm text-gray-600">Reconciled</span>
                    </label>
                </div>

                <button class="hidden" />
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="clearModal">
                Cancel
            </x-jet-secondary-button>

            <x-jet-button wire:click="addEntry">
                Add
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
