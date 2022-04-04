<div class="form__button">
    <button {{ $attributes->merge(['type' => 'submit']) }}>
        <span>{{ $slot }}</span>

        @if($icon)
            <x-shared.icon :name="$icon" aria-hidden="true" />
        @endif
    </button>
</div>
