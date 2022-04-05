<datalist id="payees-list">
    @foreach($payees as $payee)
        <option value="{{ $payee->name }}" />
    @endforeach
</datalist>
