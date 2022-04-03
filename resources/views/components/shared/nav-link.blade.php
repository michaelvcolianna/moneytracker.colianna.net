<a href="{{ $url }}" {{ $attributes }}>
    <x-shared.icon :name="$icon" aria-hidden="true" />
    <span>{{ $slot }}</span>
</a>
