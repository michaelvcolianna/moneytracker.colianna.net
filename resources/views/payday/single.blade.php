<li>
    <a class="amount current" href="{{ $payday->url() }}">
        <span class="label">{{ $payday->start() }}</span>
        <span @class([$payday->threshold()])>${{ $payday->prettyCurrentAmount() }}</span>
    </a>

    <div @class(['amount beginning', 'error' => $errors->has('beginning_amount')])>
        <label for="beginning_amount">Beginning Amount</label>

        <input id="beginning_amount.{{ $payday->id }}" type="text" wire:model.live.debounce.300ms="beginning_amount" />
    </div>
</li>
