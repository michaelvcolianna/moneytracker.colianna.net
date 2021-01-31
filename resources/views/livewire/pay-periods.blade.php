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
                    <p>
                        <em>There are no pay periods. Please add one.</em>
                    </p>
                @else
                    <div class="flex flex-row flex-wrap justify-between">
                        @foreach($pay_periods as $pay_period)
                            <div class="w-1/4 my-4">
                                <p>
                                    {{ $pay_period->date->format('n/j/Y') }}
                                </p>

                                <p>
                                    <strong>{{ $pay_period->current }}</strong>
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
                        <x-jet-label for="date" value="Date" />
                        <x-jet-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="start" value="Starting amount" />
                        <x-jet-input id="start" class="block mt-1 w-full" type="number" name="start" :value="old('start')" required />
                    </div>

                    <div class="mt-4 flex flex-row flex-wrap justify-between">
                        <p class="mb-1 w-full font-medium text-sm text-gray-700">
                            Include payees
                        </p>

                        <div class="mb-2 w-1/2">
                            <label for="test1" class="flex items-start">
                                <x-jet-checkbox id="test1" name="test1" />
                                <span class="ml-2 text-sm text-gray-600">Test 1 <strong class="block">$10</strong></span>
                            </label>
                        </div>

                        <div class="mb-2 w-1/2">
                            <label for="test2" class="flex items-start">
                                <x-jet-checkbox id="test2" name="test2" />
                                <span class="ml-2 text-sm text-gray-600">Test 2 <strong class="block">$25</strong></span>
                            </label>
                        </div>
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
