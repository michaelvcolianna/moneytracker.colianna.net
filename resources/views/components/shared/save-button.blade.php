<div class="form__actions">
    <x-form.field.button
        class="button button--save"
        wire:click="save"
    >
        Save New {{ $slot }}
    </x-form.field.button>

    <x-form.field.button
        type="reset"
        class="button button--cancel"
        @click="$wire.clearForm(); open = false"
    >
        Cancel
    </x-form.field.button>
</div>
