<div>
    <div class="flex flex-row justify-between">
        <div class="w-1/2 text-right">
            <h3 class="font-semibold text-gray-800 leading-tight mb-4">
                Amount for {{ $current->date->format('n/j/Y') }}
            </h3>

            <p class="text-8xl font-thin @if($current->current >= 1000) text-green-600 @endif @if($current->current < 0) text-red-600 @endif">
                {{ $current->getPrettyCurrent() }}
            </p>

            <p class="text-gray-600">
                of {{ $current->getPrettyStart() }}
            </p>
        </div>

        <div class="w-1/3">
            <h3 class="font-semibold text-gray-800 leading-tight mb-4" wire:click="$toggle('modal')">
                Add an Entry
            </h3>

            {{-- <form wire:submit.prevent="addEntry" class="mt-4">
                @csrf

                <input type="hidden" wire:model="pay_period_id">

                <div>
                    <x-jet-label for="amount" value="Amount" />
                    <x-jet-input id="amount" class="block mt-1 w-full" type="number" step="0.01" wire:model="amount" :value="old('amount')" required />
                    <x-jet-input-error for="amount" class="mt-2" />
                </div>

                @if($payees->count() > 0)
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
                @endif

                <div class="mt-4">
                    <x-jet-label for="name">
                        Name
                        @if($payees->count() > 0)
                            <span class="ml-4 text-xs text-gray-400">(Only used if payee isn't selected)</span>
                        @endif
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
                    <x-jet-button class="bg-blue-600">
                        Add
                    </x-jet-button>
                </div>
            </form> --}}
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            test
        </x-slot>

        <x-slot name="content">
            oh damn
        </x-slot>

        <x-slot name="footer">
            boom
        </x-slot>
    </x-jet-confirmation-modal>
</div>
