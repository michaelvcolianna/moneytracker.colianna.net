<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:dashboard.pay-periods :date="$date->format('Y-m-d')" />

            <div class="px-4 lg:px-0 lg:w-1/2 flex flex-row flex-wrap items-center">
                <livewire:dashboard.amount :date="$date->format('Y-m-d')" />
                <livewire:dashboard.add-entry :date="$date->format('Y-m-d')" />
            </div>

            <livewire:dashboard.entries :date="$date->format('Y-m-d')" />
        </div>
    </div>
</x-app-layout>
