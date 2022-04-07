<div class="entry" id="entry-{{ $entry->id }}" aria-label="Entry">
    <x-fields.entry :entry="$entry" />

    <div
        class="form__confirm field__delete"
        :class="open && 'open'"
        x-data="{ open: false }"
    >
        <button
            type="button"
            class="button button--more"
            @click="open = !open"
        >
            <span>Options...</span>
            <x-shared.icon name="trash-2" />
        </button>

        <button
            type="button"
            class="button button--danger"
            wire:click="delete"
            @click.away="open = false"
            x-cloak
            x-show="open"
            x-transition
        >
            <span>Delete Entry<span>
        </button>
    </div>
</div>
