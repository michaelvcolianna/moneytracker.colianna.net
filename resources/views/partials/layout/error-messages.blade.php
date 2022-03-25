@if($errors->any())
    <section class="page__errors" role="alert">
        <h3>Errors</h3>

        <p>The following errors occurred:</p>

        <ul>
            @foreach($errors->all() as $error)
                <li>
                    <x-shared.icon name="chevron-right" aria-hidden="true" />
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </section>
@endif
