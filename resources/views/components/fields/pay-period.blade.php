<div class="form__fields">
    <x-form.field.input
        id="{{ $prefix }}start"
        type="date"
        wire:model.lazy="payPeriod.start"
    >
        Starting Date
    </x-form.field.input>

    <x-form.field.input
        id="{{ $prefix }}amount"
        type="number"
        wire:model.lazy="payPeriod.amount"
    >
        Amount
    </x-form.field.input>
</div>
