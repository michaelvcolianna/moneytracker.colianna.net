<div class="button button--{{ $id }}">
    <button {{ $attributes->merge(['type' => 'button']) }}>
        <strong>{{ $label }}</strong>

        @if($icon)
            <span aria-hidden="true">{!! $icon !!}</span>
        @endif
    </button>
</div>
