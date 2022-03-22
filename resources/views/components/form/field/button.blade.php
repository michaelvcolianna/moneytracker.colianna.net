<div class="button button--{{ $id }}">
    <button {{ $attributes->merge(['type' => 'button']) }}>
        <span>{{ $label }}</span>

        @if($icon)
            <x-shared.icon :name="$icon" aria-hidden="true" />
        @endif
    </button>
</div>
