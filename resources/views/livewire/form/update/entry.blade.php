<div class="entry" id="entry-{{ $entry->id }}" aria-label="Entry">
    <x-fields.entry :entry="$entry" />

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
