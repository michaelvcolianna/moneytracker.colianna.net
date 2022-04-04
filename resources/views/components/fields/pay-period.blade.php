<div class="form__fields">
    <x-form.field.input
        id="{{ $prefix }}start"
        type="date"
        wire:model.lazy="payPeriod.start"
        :adding="$add"
    >
        Starting Date
    </x-form.field.input>

    <x-form.field.input
        id="{{ $prefix }}amount"
        type="number"
        wire:model.lazy="payPeriod.amount"
        :adding="$add"
    >
        Amount
    </x-form.field.input>
</div>
