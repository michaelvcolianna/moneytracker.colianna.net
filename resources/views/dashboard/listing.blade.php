<div>
    @if($edit_id)
        <h3 class="font-semibold text-gray-800 leading-tight mb-4">
            Edit Entry
        </h3>

        <div class="w-1/4">
            <form wire:submit.prevent="updateEntry">
                @csrf

                <div>
                    <x-jet-label for="amount" value="Amount" />
                    <x-jet-input id="amount" class="block mt-1 w-full" type="number" step="0.01" wire:model="amount" :value="old('amount')" required />
                    <x-jet-input-error for="amount" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="payee" value="Payee" />
                    <select id="payee" wire:model="payee_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                        <option value>-- Choose --</option>
                        @foreach($payees as $payee)
                            <option value="{{ $payee->id }}">{{ $payee->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="payee_id" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="name">
                        Name
                        <span class="ml-4 text-xs text-gray-400">(Only used if payee isn't selected)</span>
                    </x-jet-label>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('amount')" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="scheduled" class="flex items-start">
                        <x-jet-checkbox id="scheduled" wire:model="scheduled" />
                        <span class="ml-2 text-sm text-gray-600">Scheduled</span>
                    </label>
                </div>

                <div class="mt-4">
                    <label for="reconciled" class="flex items-start">
                        <x-jet-checkbox id="reconciled" wire:model="reconciled" />
                        <span class="ml-2 text-sm text-gray-600">Reconciled</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button type="button" class="bg-pink-600 mr-2" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deleteEntry">
                        Delete
                    </x-jet-button>

                    <x-jet-button class="bg-green-600 mr-2">
                        Update
                    </x-jet-button>

                    <x-jet-button type="button" wire:click="closeEntry">
                        Cancel
                    </x-jet-button>
                </div>
            </form>
        </div>
    @else
        <h3 class="font-semibold text-gray-800 leading-tight mb-4">
            Entries
        </h3>

        <p>
            Tap to edit.
        </p>

        @if($current->entries->count() < 1)
            <p class="mt-4 italic">
                There are no entries. Please add some.
            </p>
        @else
            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach($current->entries as $entry)
                    <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="openEntry({{ $entry->id }})">
                        <div class="p-4">
                            <p class="font-thin text-3xl">
                                {{ $entry->getPrettyAmount() }}
                            </p>

                            <p class="text-gray-500 font-bold text-sm truncate">
                                {{ $entry->getRealName() }}
                            </p>

                            <div class="text-sm flex flex-row justify-between mt-2">
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
    @endif
</div>
