<div class="pay-period" id="{{ $fieldId }}" aria-label="Pay period">
    <x-form.field.input id="{{ $fieldId }}-date" test="payPeriod.start" label="Starting Date" type="date" wire:model.lazy="payPeriod.start" />
    <x-form.field.input id="{{ $fieldId }}-amount" test="payPeriod.amount" label="Amount" type="number" step="0.01" wire:model.lazy="payPeriod.amount" />
    <x-form.field.boolean id="{{ $fieldId }}-biweeky" test="payPeriod.biweekly" label="Biweekly" wire:model="payPeriod.biweekly" />
</div>
