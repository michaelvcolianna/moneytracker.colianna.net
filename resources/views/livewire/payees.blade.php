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
                    <p>
                        <em>There are no payees. Please add some.</em>
                    </p>
                @else
                    <div class="flex flex-row flex-wrap justify-between">
                        @foreach($payees as $payee)
                            <div class="w-1/4 my-4">
                                <p>
                                    <strong>{{ $payee->name }}</strong>
                                </p>

                                @if($payee->amount)
                                    <p>
                                        Standard amount:
                                        <em>{{ $payee->amount }}</em>
                                    </p>
                                @endif

                                <p>
                                    Auto-schedule:
                                    <em>{{ $payee->schedule ? 'Yes' : 'No' }}</em>
                                </p>

                                <p>
                                    edit link
                                </p>

                                <p>
                                    delete button
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="my-8 max-w-sm">
                <h3 class="font-semibold text-gray-800 leading-tight">
                    Add New
                </h3>

                <form method="post" action="#">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="Name" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="amount" value="Standard amount" />
                        <x-jet-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" />
                    </div>

                    <div class="mt-4">
                        <label for="schedule" class="flex items-start">
                            <x-jet-checkbox id="schedule" name="schedule" />
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
