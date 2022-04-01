<div class="entries__amount" aria-label="Pay date amount">
    @if($payDate)
        <div class="current">${{ $this->moneyFormatComma($payDate->current) }}</div>
        <div class="total">of ${{ $this->moneyFormatComma($payDate->beginning) }}</div>

        <div class="entries__amount__edit">
            @if(!$isFormShowing)
                <button type="button" class="form-toggle" wire:click="$toggle('isFormShowing')">
                    <span>Edit Amount</span>
                    <x-shared.icon name="edit" aria-hidden="true" />
                </button>
            @else
                <div class="entries__amount__form">
                    <h3>Edit Original Amount</h3>

                    <x-form.field.input id="entries-beginning" test="payDate.beginning" label="Original Amount" type="number" step="0.01" wire:model.lazy="payDate.beginning" />
                    <x-form.field.button id="add" label="Save Amount" icon="save" class="save" wire:click="update" />
                    <x-form.field.button id="cancel" type="reset" icon="cancel" class="cancel" wire:click="$toggle('isFormShowing')" />
                </div>
            @endif
        </div>
    @endif
</div>
