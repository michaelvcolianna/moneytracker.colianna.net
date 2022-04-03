<nav aria-label="Pay dates">
    <ul class="dates">
        <li class="dates__previous">
            <a
                href="{{ route('dashboard', ['date' => $payDate->previous->format('Y-m-d')]) }}"
                rel="prev"
                aria-label="Previous pay date: {{ $payDate->previous->format('F j Y') }}"
            >
                <x-shared.icon name="chevrons-left" aria-hidden="true" />

                <time datetime="{{ $payDate->previous->format('c') }}">
                    {{ $payDate->previous->format('Y-m-d') }}
                </time>
            </a>
        </li>

        <li class="dates__current">
            <time
                datetime="{{ $payDate->start->format('c') }}"
                aria-current="true"
                aria-label="Current pay date: {{ $payDate->start->format('F j Y') }}"
            >
                {{ $payDate->start->format('Y-m-d') }}
            </time>
        </li>

        <li class="dates__next">
            <a
                href="{{ route('dashboard', ['date' => $payDate->next->format('Y-m-d')]) }}"
                rel="next"
                aria-label="Next pay date: {{ $payDate->next->format('F j Y') }}"
            >
                <time datetime="{{ $payDate->next->format('c') }}">
                    {{ $payDate->next->format('Y-m-d') }}
                </time>

                <x-shared.icon name="chevrons-right" aria-hidden="true" />
            </a>
        </li>
    </ul>
</nav>
