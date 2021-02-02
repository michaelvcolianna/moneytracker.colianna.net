<div>
    @if($edit_id)
        <h3 class="font-semibold text-gray-800 leading-tight mb-4">
            Edit {{ $date }}
        </h3>

        <div class="w-1/4">
            <form wire:submit.prevent="updatePayPeriod">
                @csrf

                <div>
                    <x-jet-label for="start" value="Starting amount" />
                    <x-jet-input id="start" class="block mt-1 w-full" type="number" step="0.01" wire:model="start" :value="old('start')" required />
                    <x-jet-input-error for="start" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button type="button" class="bg-pink-600 mr-2" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deletePayPeriod">
                        Delete
                    </x-jet-button>

                    <x-jet-button class="bg-green-600 mr-2">
                        Update
                    </x-jet-button>

                    <x-jet-button type="button" wire:click="closePayPeriod">
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

        @if($pay_periods->count() < 1)
            <p class="mt-4 italic">
                There are no pay periods. Please add some.
            </p>
        @else
            <div>
                {{ $pay_periods->links() }}
            </div>

            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach($pay_periods as $pay_period)
                    <a class="bg-white rounded shadow cursor-pointer transform transition-transform hover:scale-105" wire:click="openPayPeriod({{ $pay_period->id }})">
                        <div class="p-4">
                            <p class="font-thin text-3xl">
                                {{ $pay_period->getPrettyCurrent() }}
                            </p>

                            <p class="text-gray-500 font-bold text-sm">
                                {{ $pay_period->date->format('n/j/Y') }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    @endif
</div>
