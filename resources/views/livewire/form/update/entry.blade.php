<div class="entry" id="{{ $fieldId }}" aria-label="Entry">
    <x-form.field.input id="{{ $fieldId }}-amount" label="Amount" type="number" step="0.01" test="entry.amount" wire:model.lazy="entry.amount" />
    <x-form.field.input id="{{ $fieldId }}-payee" label="Payee" type="list" list="payees-list" test="entry.payee" wire:model.lazy="entry.payee" />
    <x-form.field.boolean id="{{ $fieldId }}-scheduled" label="Scheduled" test="entry.scheduled" wire:model="entry.scheduled" />
    <x-form.field.boolean id="{{ $fieldId }}-reconciled" label="Reconciled" test="entry.reconciled" wire:model="entry.reconciled" />

    @if(!$isConfirmShowing)
        <x-form.field.button id="delete" label="Delete Entry" icon="question" wire:click="$set('isConfirmShowing', true)" />
    @endif

    @if($isConfirmShowing)
        <x-form.field.button id="delete" label="Delete Entry" icon="trash" class="danger" wire:click="delete" />
        <x-form.field.button id="cancel" type="reset" icon="cancel" class="cancel" wire:click="$set('isConfirmShowing', false)" />
    @endif
</div>
