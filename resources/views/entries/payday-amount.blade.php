<div>
    <x-shared.errors />

    <div>${{ session('payday')->prettyCurrent() }}</div>

    <div>
        <label for="beginning_amount">Beginning Amount</label>

        <input
            id="beginning_amount"
            type="text"
            wire:model.debounce.300ms="beginning_amount"
        >
    </div>
</div>
