<nav aria-label="Pay dates">
    <ul class="dates">
        <li class="dates__previous">
            <x-shared.date-link
                :date="$payDate->previous"
                aria="Previous"
                arrow="left"
                rel="prev"
            />
        </li>

        <li class="dates__current">
            <time
                datetime="{{ $rfc }}"
                aria-current="true"
                aria-label="Current pay date: {{ $current }}"
            >
                {{ $date }}
            </time>
        </li>

        <li class="dates__next">
            <x-shared.date-link
                :date="$payDate->next"
                aria="Next"
                arrow="right"
                rel="next"
            />
        </li>
    </ul>
</nav>
