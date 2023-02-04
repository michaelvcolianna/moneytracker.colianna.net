@if($errors->any())
    <div role="alert">
        <div>There were errors. Please check:</div>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
