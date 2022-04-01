<div class="payee" id="{{ $fieldId }}" aria-label="Payee">
    <x-form.field.input id="{{ $fieldId }}-name" label="Name" type="text" test="payee.name" wire:model.lazy="payee.name" />
    <x-form.field.input id="{{ $fieldId }}-amount" label="Schedule Amount" type="number" step="0.01" test="payee.amount" wire:model.lazy="payee.amount" />
    <x-form.field.input id="{{ $fieldId }}-start" label="Schedule Start Day" type="number" step="1" min="1" max="31" test="payee.start" wire:model.lazy="payee.start" />
    <x-form.field.input id="{{ $fieldId }}-end" label="Schedule End Day" type="number" step="1" min="1" max="31" test="payee.end" wire:model.lazy="payee.end" />
    <x-form.field.options id="{{ $fieldId }}-month" label="Schedule Months" type="months" :options="$options" :areAnySelected="$areAnySelected" />
    <x-form.field.boolean id="{{ $fieldId }}-active" label="Active for autocomplete" test="payee.active" wire:model="payee.active" />
</div>
