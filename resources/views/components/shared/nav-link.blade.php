<a href="{{ $url }}" {{ $attributes }} {!! $current ? 'aria-current="page"' : '' !!}>
    <x-shared.icon :name="$icon" height="1.75rem" width="1.75rem" aria-hidden="true" />
    <span>{{ $label }}</span>
</a>
