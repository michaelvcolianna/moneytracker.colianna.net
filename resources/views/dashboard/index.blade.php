<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard: {{ $date->format('n/j/Y') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row justify-between">
                <div class="w-1/2 flex flex-row flex-wrap items-center">
                    <livewire:dashboard.amount :date="$date->format('Y-m-d')" />
                    <livewire:dashboard.add-entry :date="$date->format('Y-m-d')" />
                    <livewire:dashboard.entries :date="$date->format('Y-m-d')" />
                </div>

                <div class="w-1/3">
                    <livewire:dashboard.pay-periods />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
