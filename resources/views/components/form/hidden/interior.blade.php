@props(['title' => null])

<div
    class="form__interior"
    x-cloak
    @click.away="open = false"
    x-show="open"
    x-transition
>
    @if($title)
        <div class="form__title">
            <h4>
                {{ $title }}
            </h4>
        </div>
    @endif

    {{ $slot }}
</div>
