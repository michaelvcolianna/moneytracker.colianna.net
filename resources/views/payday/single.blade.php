<li>
    <x-shared.errors />

    <div>
        <span>{{ $payday->start() }}</span>
        <span>${{ $payday->prettyCurrentAmount() }}</span>
    </div>

    <div>
        <label for="payday.beginning_amount">Beginning Amount</label>

        <input
            id="payday.beginning_amount"
            type="text"
            wire:model.debounce.300ms="payday.beginning_amount"
        />
    </div>
</li>
