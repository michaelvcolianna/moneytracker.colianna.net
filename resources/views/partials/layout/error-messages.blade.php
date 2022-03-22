@if($errors)
    <section class="page__errors" role="alert">
        <h3>Errors</h3>

        <p>The following errors occurred:</p>

        <ul>
            <li>
                <x-shared.icon name="chevron-right" aria-hidden="true" />
                First
            </li>

            <li>
                <x-shared.icon name="chevron-right" aria-hidden="true" />
                Second
            </li>

            <li>
                <x-shared.icon name="chevron-right" aria-hidden="true" />
                Third
            </li>
        </ul>
    </section>
@endif
