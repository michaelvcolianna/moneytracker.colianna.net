<div class="payee" id="payee-{{ $num }}" aria-label="Payee">
    <x-form.field.boolean id="payee-{{ $num }}-active" label="Active" />
    <x-form.field.input id="payee-{{ $num }}-name" label="Name" type="text" value="{{ $name }}" />
    <x-form.field.input id="payee-{{ $num }}-amount" label="Schedule Amount" type="number" step="0.01" value="{{ $amount }}" />
    <x-form.field.options id="payee-{{ $num }}-month" label="Schedule Months" type="months" :options="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']" :areAnySelected="$areAnySelected" />
    <x-form.field.input id="payee-{{ $num }}-start" label="Schedule Start Day" type="number" step="1" min="1" max="31" value="{{ $start }}" />
    <x-form.field.input id="payee-{{ $num }}-end" label="Schedule End Day" type="number" step="1" min="1" max="31" value="{{ $end }}" />
</div>
