<div class="form__actions">
    <x-form.field.button
        icon="plus-circle"
        class="button--save"
        wire:click="save"
    >
        Save New {{ $slot }}
    </x-form.field.button>

    <x-form.field.button
        type="reset"
        icon="x-circle"
        class="button--cancel"
        @click="$wire.clearForm(); open = false"
    >
        Cancel
    </x-form.field.button>
</div>
