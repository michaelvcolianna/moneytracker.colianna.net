<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Payees
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <h3 class="font-semibold text-gray-800 leading-tight">
                    List
                </h3>

                @if($payees->count() < 1)
                    <p class="mt-4 italic">
                        There are no payees. Please add some.
                    </p>
                @else
                    <div>
                        {{ $payees->links() }}
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 auto-cols-fr">
                        @foreach($payees as $payee)
                            <div class="bg-white rounded shadow">
                                <div class="p-4">
                                    <p class="text-3xl font-thin mb-2">
                                        {{ $payee->name }}
                                    </p>

                                    <p class="text-gray-500 text-sm">
                                        @if($payee->amount)
                                            {{ $payee->amount }} standard
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

                                <div class="flex flex-row flex-wrap justify-between border-t border-gray-200">
                                    <button class="w-1/2 py-2 bg-gray-100 text-blue-600 rounded-bl" wire:click="editPayee({{ $payee->id }})">
                                        Edit
                                    </button>

                                    <button class="w-1/2 py-2 bg-gray-100 text-red-600 rounded-br" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deletePayee({{ $payee->id }})">
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

                <form wire:submit.prevent="addPayee" class="mt-4">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="Name" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')" required />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="amount" value="Standard amount" />
                        <x-jet-input id="amount" class="block mt-1 w-full" type="number" wire:model="amount" :value="old('amount')" />
                        <x-jet-input-error for="amount" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="schedule" class="flex items-start">
                            <x-jet-checkbox id="schedule" wire:model="schedule" />
                            <span class="ml-2 text-sm text-gray-600">Auto-schedule</span>
                        </label>
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
