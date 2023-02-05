<li>
    <x-shared.errors />

    <div>
        <label for="payee.name">Name</label>

        <input
            id="payee.name"
            type="text"
            wire:model="payee.name"
            x-ref="name"
        >
    </div>

    <div>
        <label for="payee.schedule_amount">Schedule Amount</label>

        <input
            id="payee.schedule_amount"
            type="text"
            wire:model="payee.schedule_amount"
        >
    </div>

    <div>
        <label for="payee.earliest_day">Earliest Day</label>

        <input
            id="payee.earliest_day"
            type="text"
            wire:model="payee.earliest_day"
        >
    </div>

    <div>
        <label for="payee.latest_day">Latest Day</label>

        <input
            id="payee.latest_day"
            type="text"
            wire:model="payee.latest_day"
        >
    </div>

    <div>
        <label>
            <input
                id="payee.auto_schedule"
                type="checkbox"
                wire:model="payee.auto_schedule"
            >

            <span>Auto-schedule amount on months:</span>
        </label>
    </div>

    <div>
        <div>
            @foreach(range(1, 12) as $number)
                <x-payee.month prefix="payee" :number="$number" />
            @endforeach
        </div>

        <a href="#months" wire:click.prevent="toggleAllMonths">
            Select/Deselect All
        </a>
    </div>

    <div x-data="{ confirmingDelete: @entangle('confirmingDelete') }">
        <a href="#delete" @click.prevent="confirmingDelete = !confirmingDelete">
            Delete Payee
        </a>

        <div
            x-cloak
            x-show="confirmingDelete"
            @click.outside="confirmingDelete = false"
        >
            <a href="#confirm" wire:click.prevent="deletePayee">
                Confirm Delete
            </a>
        </div>
    </div>
</li>
