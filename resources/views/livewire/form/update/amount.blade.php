<div class="entries__amount" aria-label="Pay date amount">
    <div class="current">$1,500.00</div>
    <div class="total">of $2,000.00</div>

    <div class="entries__amount__edit">
        @if(!$isFormShowing)
            <button type="button" class="form-toggle" wire:click="$toggle('isFormShowing')">
                <span>Edit Amount</span>
                <x-shared.icon name="edit" aria-hidden="true" />
            </button>
        @else
            <div class="entries__amount__form">
                <h3>Edit Original Amount</h3>

                <x-form.field.input id="entries-amount" test="payDate.amount" label="Original Amount" type="number" step="0.01" wire:model.lazy="payDate.amount" />
                <x-form.field.button id="add" label="Save Amount" icon="save" class="save" wire:click="save" />
                <x-form.field.button id="cancel" type="reset" icon="cancel" class="cancel" wire:click="clearForm" />
            </div>
        @endif
    </div>

    @dump($payDate)
</div>
