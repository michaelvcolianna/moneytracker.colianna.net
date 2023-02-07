<li>
    <x-shared.errors />

    <div class="amount current">
        <span class="label">{{ $payday->start() }}</span>
        <span @class([$payday->threshold()])>${{ $payday->prettyCurrentAmount() }}</span>
    </div>

    <div class="amount beginning">
        <label for="payday.beginning_amount">Beginning Amount</label>

        <input
            id="payday.beginning_amount"
            type="text"
            wire:model.debounce.300ms="payday.beginning_amount"
        />
    </div>
</li>
