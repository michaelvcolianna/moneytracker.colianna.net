<div class="pay-period" id="{{ $fieldId }}" aria-label="Pay period">
    <x-form.field.input
        id="{{ $fieldId }}-start"
        type="date"
        wire:model.lazy="payPeriod.start"
    >
        Starting Date
    </x-form.field.input>

    <x-form.field.input
        id="{{ $fieldId }}-amount"
        type="number"
        wire:model.lazy="payPeriod.amount"
    >
        Amount
    </x-form.field.input>
</div>
