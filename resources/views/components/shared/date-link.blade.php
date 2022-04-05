<a
    href="{{ $href }}"
    rel="{{ $rel }}"
    aria-label="{{ $aria }} date: {{ $label }}"
>
    <time datetime="{{ $rfc }}">
        {{ $time }}
        <x-shared.icon name="chevrons-{{ $arrow }}" />
    </time>
</a>
