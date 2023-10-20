<li>
    <x-shared.errors />

    <a class="amount current" href="{{ $payday->url() }}">
        <span class="label">{{ $payday->start() }}</span>
        <span @class([$payday->threshold()])>${{ $payday->prettyCurrentAmount() }}</span>
    </a>

    <div class="amount beginning">
        <label for="payday.beginning_amount">Beginning Amount</label>

        <input
            id="payday.beginning_amount"
            type="text"
            wire:model.live.debounce.300ms="payday.beginning_amount"
        />
    </div>
</li>
