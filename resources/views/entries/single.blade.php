<li>
    <div @class(['error' => $errors->has('payee')])>
        <label for="payee.{{ $entry->id }}">Payee</label>
        <input id="payee.{{ $entry->id }}" type="text" wire:model.live.debounce.300ms="payee">
    </div>

    <div @class(['error' => $errors->has('amount')])>
        <label for="amount.{{ $entry->id }}">Amount</label>
        <input id="amount.{{ $entry->id }}" type="text" wire:model.live.debounce.300ms="amount">
    </div>

    <div class="checkboxes">
        <div>
            <label>
                <input id="scheduled.{{ $entry->id }}" type="checkbox" wire:model.live="scheduled">
                <span>Scheduled</span>
            </label>
        </div>

        <div>
            <label>
                <input id="reconciled.{{ $entry->id }}" type="checkbox" wire:model.live="reconciled">
                <span>Reconciled</span>
            </label>
        </div>
    </div>

    <div class="delete-entry" :class="$wire.confirmingDelete && 'expanded'" @click.outside="$wire.confirmingDelete = false">
        <button :class="$wire.confirmingDelete && 'ghost'" type="button" @click.prevent="$wire.$toggle('confirmingDelete')">Delete Entry</button>

        <div class="confirm">
            <button class="danger" type="button" wire:click.prevent="deleteEntry">Confirm</button>
        </div>
    </div>
</li>
