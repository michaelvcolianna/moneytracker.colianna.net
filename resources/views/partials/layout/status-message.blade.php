@if(session('status'))
    <section class="page__status" role="dialog">
        <p>
            <x-shared.icon name="info" aria-hidden="true" />
            {{ session('status') }}
        </p>
    </section>
@endif
