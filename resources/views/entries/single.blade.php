<li>
    <x-shared.errors />

    <div>
        <label for="entry.payee">Payee</label>

        <input
            id="entry.payee"
            type="text"
            wire:model.debounce.300ms="entry.payee"
        >
    </div>

    <div>
        <label for="entry.amount">Amount</label>

        <input
            id="entry.amount"
            type="text"
            wire:model.debounce.300ms="entry.amount"
        >
    </div>

    <div>
        <label>
            <input
                id="entry.scheduled"
                type="checkbox"
                wire:model="entry.scheduled"
            >

            <span>Scheduled</span>
        </label>
    </div>

    <div>
        <label>
            <input
                id="entry.reconciled"
                type="checkbox"
                wire:model="entry.reconciled"
            >

            <span>Reconciled</span>
        </label>
    </div>

    <div x-data="{ confirmingDelete: @entangle('confirmingDelete') }">
        <button type="button" @click="confirmingDelete = !confirmingDelete">
            Delete Entry
        </button>

        <div
            x-cloak
            x-show="confirmingDelete"
            @click.outside="confirmingDelete = false"
        >
            <button type="button" wire:click="deleteEntry">
                Confirm Delete
            </button>
        </div>
    </div>
</li>
