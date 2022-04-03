<x-form.field.button icon="plus-circle" class="button--save" wire:click="save">
    Save New {{ $label }}
</x-form.field.button>

<x-form.field.button
    type="reset"
    icon="x-circle"
    class="button--cancel"
    wire:click="clearForm"
>
    Cancel
</x-form.field.button>
