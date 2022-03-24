<div class="entry" id="entry-{{ $num }}" aria-label="Entry">
    <x-form.field.input id="entry-{{ $num }}-amount" label="Amount" type="number" step="0.01" value="{{ $amount }}" />
    <x-form.field.input id="entry-{{ $num }}-payee" label="Payee" type="list" list="payees-list" value="{{ $payee }}" />
    <x-form.field.boolean id="entry-{{ $num }}-scheduled" label="Scheduled" />
    <x-form.field.boolean id="entry-{{ $num }}-reconciled" label="Reconciled" />

    @if(!$isConfirmShowing)
        <x-form.field.button id="delete" label="Delete Entry" icon="question" wire:click="$set('isConfirmShowing', true)" />
    @endif

    @if($isConfirmShowing)
        <x-form.field.button id="delete" label="Delete Entry" icon="trash" class="danger" />
        <x-form.field.button id="cancel" type="reset" icon="cancel" class="cancel" wire:click="$set('isConfirmShowing', false)" />
    @endif
</div>
