<div @class(['payday-amount', 'error' => $errors->has('beginning_amount')])>
    <div @class([session('payday')->threshold()])>
        <span class="label">Current Amount</span>
        <span>${{ session('payday')->prettyCurrentAmount() }}</span>
    </div>

    <div>
        <label for="beginning_amount">Beginning Amount</label>
        <input id="beginning_amount" type="text" wire:model.live.debounce.300ms="beginning_amount">
    </div>
</div>
