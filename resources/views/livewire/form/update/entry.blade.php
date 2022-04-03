<div class="entry" id="{{ $fieldId }}" aria-label="Entry">
    <x-form.field.input
        id="{{ $fieldId }}-amount"
        type="number"
        wire:model.lazy="entry.amount"
    >
        Amount
    </x-form.field.input>

    <x-form.field.input
        id="{{ $fieldId }}-payee"
        type="list"
        list="payees-list"
        wire:model.lazy="entry.payee"
    />

    <x-form.field.boolean
        id="{{ $fieldId }}-scheduled"
        wire:model="entry.scheduled"
    >
        Scheduled
    </x-form.field.boolean>

    <x-form.field.boolean
        id="{{ $fieldId }}-reconciled"
        wire:model="entry.reconciled"
    >
        Reconciled
    </x-form.field.boolean>

    <div
        class="form__confirm field__delete"
        :class="open && 'open'"
        x-data="{ open: false }"
    >
        <button
            type="button"
            class="button--more icon icon--vertical"
            @click="open = !open"
        >
            <span>Options...</span>
        </button>

        <x-form.hidden.interior>
            <x-form.field.button
                type="button"
                icon="trash"
                class="button--danger"
                wire:click="delete"
            >
                Delete Entry
            </x-form.field.button>
        </x-form.hidden.interior>
    </div>
</div>
