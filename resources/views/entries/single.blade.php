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

    <div class="checkboxes">
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
    </div>

    <div
        class="delete-entry"
        :class="confirmingDelete && 'expanded'"
        x-data="{ confirmingDelete: @entangle('confirmingDelete') }"
    >
        <button
            :class="confirmingDelete && 'ghost'"
            type="button"
            @click.prevent="confirmingDelete = !confirmingDelete"
        >
            Delete Entry
        </button>

        <div
            class="confirm"
            @click.outside="confirmingDelete = false"
        >
            <button
                class="danger"
                type="button"
                wire:click.prevent="deleteEntry"
            >
                Confirm
            </button>
        </div>
    </div>
</li>
