<div class="pay-date" id="{{ $fieldId }}" aria-label="Pay Date">
    <div class="pay-date__title">
        {{ $payDate->start->format('Y-m-d') }}
    </div>

    <div class="pay-date__amount amount{{ $payDate->css_class }}">
        ${{ $payDate->formatted_current }}
    </div>

    <x-form.field.input
        id="{{ $fieldId }}beginning"
        type="number"
        wire:model.lazy="payDate.beginning"
    >
        Beginning Amount
    </x-form.field.input>
</div>
