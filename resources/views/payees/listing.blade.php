<div>
    @if($edit_id)
        <h3 class="font-semibold text-gray-800 leading-tight mb-4">
            Edit Payee
        </h3>

        <div class="w-1/4">
            <form wire:submit.prevent="updatePayee">
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
                    <x-jet-button type="button" class="bg-pink-600 mr-2" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deletePayee">
                        Delete
                    </x-jet-button>

                    <x-jet-button class="bg-green-600 mr-2">
                        Update
                    </x-jet-button>

                    <x-jet-button type="button" wire:click="closePayee">
                        Cancel
                    </x-jet-button>
                </div>
            </form>
        </div>
    @else
        <h3 class="font-semibold text-gray-800 leading-tight">
            List
        </h3>

        <p>
            Tap to edit.
        </p>

        @if($payees->count() < 1)
            <p class="mt-4 italic">
                There are no payees. Please add some.
            </p>
        @else
            <div>
                {{ $payees->links() }}
            </div>

            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach($payees as $payee)
                    <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="openPayee({{ $payee->id }})">
                        <div class="p-4">
                            <p class="text-3xl font-thin mb-2 truncate">
                                {{ $payee->name }}
                            </p>

                            <p class="text-gray-500 text-sm">
                                @if($payee->amount)
                                    {{ $payee->getPrettyAmount() }} standard
                                @else
                                    No standard amount
                                @endif
                            </p>

                            <p class="text-gray-500 text-sm">
                                @if($payee->schedule)
                                    Scheduled automatically
                                @else
                                    Not scheduled automatically
                                @endif
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    @endif
</div>
