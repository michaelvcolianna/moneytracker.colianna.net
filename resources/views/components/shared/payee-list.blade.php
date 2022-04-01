<datalist id="payees-list">
    @foreach($payees as $payee)
        <option value="{{ $payee->id }}">{{ $payee->name }}</option>
    @endforeach
</datalist>
