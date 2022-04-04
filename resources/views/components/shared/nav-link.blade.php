<a href="{{ $url }}" {{ $attributes }}>
    @if($icon)
        <x-shared.icon :name="$icon" aria-hidden="true" />
    @endif

    <span>{{ $slot }}</span>
</a>
