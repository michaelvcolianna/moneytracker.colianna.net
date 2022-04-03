<div class="page__dashboard__amount" aria-label="Pay date amount">
    <div class="amount__current">
        ${{ $payDate->formatted_current }}
    </div>

    <div class="amount__total">
        of ${{ $payDate->formatted_beginning }}
    </div>

    <x-form.hidden title="Update Amount" submit="update">
        <x-form.field.input
            id="beginning"
            type="number"
            wire:model.defer="payDate.beginning"
        >
            Beginning Amount
        </x-form.field.input>

        <x-form.field.button
            icon="save"
            class="button--save"
            @click="$wire.update(); open = false"
        >
            Save Amount
        </x-form.field.button>

        <x-form.field.button
            type="reset"
            icon="x-circle"
            class="button--cancel"
            @click="$wire.clearForm(); open = false"
        >
            Cancel
        </x-form.field.button>
    </x-form.hidden>
</div>
