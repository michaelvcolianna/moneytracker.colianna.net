<div class="order-2 lg:order-1 w-full lg:w-1/2 px-4 lg:px-0 mt-8 lg:mt-0">
    @if($payees->count() < 1)
        <p class="italic">
            There are no payees yet. Please add some.
        </p>
    @else
        @if($payees->hasPages())
            <div class="mb-4">
                {{ $payees->links() }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            @foreach($payees as $payee)
                <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="openPayee({{ $payee->id }})">
                    <div class="p-4">
                        <p class="text-3xl font-thin mb-2 truncate">
                            {{ $payee->name }}
                        </p>

                        @if($payee->amount)
                            <p class="text-gray-500 text-sm">
                                {{ $payee->getPrettyAmount() }} standard
                            </p>
                        @endif

                        @if($payee->schedule)
                            <p class="text-gray-500 text-sm">
                            Scheduled automatically
                            </p>
                        @endif

                        @if($payee->notes)
                            <p class="text-xs mt-2 pt-2 border-t border-gray-200">
                                {{ $payee->notes }}
                            </p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Edit Payee
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updatePayee">
                <input type="hidden" wire:model="payee_id" />

                <div>
                    <x-jet-label for="edit-payee-name" value="Name" />
                    <x-jet-input id="edit-payee-name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')" required />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="edit-payee-amount" value="Amount" />
                    <x-jet-input id="edit-payee-amount" class="block mt-1 w-full" type="number" step="0.01" wire:model="amount" :value="old('amount')" />
                    <x-jet-input-error for="amount" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="edit-payee-notes" value="Notes" />
                    <x-textarea id="edit-payee-notes" class="block mt-1 w-full h-20 resize-none" wire:model="notes" :value="old('notes')" />
                    <x-jet-input-error for="notes" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="edit-payee-schedule" class="flex items-start">
                        <x-jet-checkbox id="edit-payee-schedule" wire:model="schedule" />
                        <span class="ml-2 text-sm text-gray-600">Auto-schedule</span>
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
                <x-jet-danger-button class="mr-2" wire:click="deletePayee">
                    Delete
                </x-jet-danger-button>
            @endif

            <x-jet-button wire:click="updatePayee">
                Update
            </x-jet-button>

            <x-jet-secondary-button class="mr-2" wire:click="closePayee">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
