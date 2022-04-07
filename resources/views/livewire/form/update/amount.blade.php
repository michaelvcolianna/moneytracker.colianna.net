<div class="block block__amount" aria-label="Pay date amount">
    <div class="amount__current amount{{ $payDate->css_class }}">
        ${{ $payDate->formatted_current }}
    </div>

    <form class="amount__beginning" wire:submit.prevent="update">
        <x-form.field.input
            id="beginning"
            type="number"
            wire:model.lazy="payDate.beginning"
        >
            Beginning Amount
        </x-form.field.input>
    </form>
</div>
