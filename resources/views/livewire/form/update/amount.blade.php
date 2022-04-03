<div class="page__dashboard__amount" aria-label="Pay date amount">
    <div class="amount__current">
        ${{ $this->moneyFormat($payDate->current) }}
    </div>

    <div class="amount__total">
        of ${{ $this->moneyFormat($payDate->beginning) }}
    </div>

    <form class="form" wire:submit.prevent="update">
        <h3 class="form__toggle">
            Update Amount
        </h3>

        <div class="form__interior">
            <x-form.field.input
                id="beginning"
                type="number"
                wire:model.lazy="payDate.beginning"
            >
                Beginning Amount
            </x-form.field.input>

            <x-form.field.button
                icon="save"
                class="button--save"
                wire:click="update"
            >
                Save Amount
            </x-form.field.button>

            <x-form.field.button
                type="reset"
                icon="x-circle"
                class="button--cancel"
            >
                Cancel
            </x-form.field.button>
        </div>
    </div>
</div>
