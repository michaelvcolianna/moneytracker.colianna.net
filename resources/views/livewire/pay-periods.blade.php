<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pay Periods
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <h3 class="font-semibold text-gray-800 leading-tight">
                    List
                </h3>

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
                            <div class="bg-white rounded shadow">
                                <div class="p-4">
                                    <p class="text-gray-500 font-bold text-sm">
                                        {{ $pay_period->date->format('n/j/Y') }}
                                    </p>

                                    <p class="font-thin text-3xl">
                                        {{ $pay_period->current }}
                                    </p>
                                </div>

                                <div class="flex flex-row flex-wrap justify-between border-t border-gray-200">
                                    <button class="w-1/2 py-2 bg-gray-100 text-blue-600 rounded-bl" wire:click="editPayPeriod({{ $pay_period->id }})">
                                        Edit
                                    </button>

                                    <button class="w-1/2 py-2 bg-gray-100 text-red-600 rounded-br" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deletePayPeriod({{ $pay_period->id }})">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

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
                        <x-jet-button>
                            Add
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
