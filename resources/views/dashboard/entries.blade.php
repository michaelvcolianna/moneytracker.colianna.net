<div class="mt-8 w-full px-4 lg:px-0">
    @if($entries->count() < 1)
        <p class="mt-4 italic">
            There are no entries for this date. Please add some.
        </p>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mt-4">
            @foreach($entries as $entry)
                <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="openEntry({{ $entry->id }})">
                    <div class="p-4">
                        <p class="text-gray-500 font-bold text-sm truncate">
                            {{ $entry->getRealName() }}
                        </p>

                        <p class="font-thin text-3xl">
                            {{ $entry->getPrettyAmount() }}
                        </p>

                        <div class="text-xs flex flex-row justify-between mt-2">
                            <span class="flex items-center">
                                @includeUnless($entry->scheduled, 'circle')
                                @includeWhen($entry->scheduled, 'check')
                                Scheduled
                            </span>

                            <span class="flex items-center">
                                @includeUnless($entry->reconciled, 'circle')
                                @includeWhen($entry->reconciled, 'check')
                                Reconciled
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Edit Entry
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateEntry">
                <input type="hidden" wire:model="entry_id" />

                <div>
                    <x-jet-label for="edit-entry-amount" value="Amount" />
                    <x-jet-input id="edit-entry-amount" class="block mt-1 w-full" type="number" step="0.01" wire:model="amount" :value="old('amount')" required autofocus />
                    <x-jet-input-error for="amount" class="mt-2" />
                </div>

                @if($payees->count() > 0)
                    <div class="mt-4">
                        <x-jet-label for="edit-entry-payee" value="Payee" />
                        <select id="edit-entry-payee" wire:model="payee_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value>-- Choose --</option>
                            @foreach($payees as $payee)
                                <option value="{{ $payee->id }}">{{ $payee->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="payee_id" class="mt-2" />
                    </div>
                @endif

                <div class="mt-4">
                    <x-jet-label for="edit-entry-name">
                        Name
                        @if($payees->count() > 0)
                            <span class="ml-4 text-xs text-gray-400">(Only used if payee isn't selected)</span>
                        @endif
                    </x-jet-label>
                    <x-jet-input id="edit-entry-name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('amount')" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="edit-entry-scheduled" class="flex items-start">
                        <x-jet-checkbox id="edit-entry-scheduled" wire:model="scheduled" />
                        <span class="ml-2 text-sm text-gray-600">Scheduled</span>
                    </label>
                </div>

                <div class="mt-4">
                    <label for="edit-entry-reconciled" class="flex items-start">
                        <x-jet-checkbox id="edit-entry-reconciled" wire:model="reconciled" />
                        <span class="ml-2 text-sm text-gray-600">Reconciled</span>
                    </label>
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
                <x-jet-danger-button class="mr-2" wire:click="deleteEntry">
                    Delete
                </x-jet-danger-button>
            @endif

            <x-jet-button wire:click="updateEntry">
                Update
            </x-jet-button>

            <x-jet-secondary-button class="mr-2" wire:click="closeEntry">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
