<div class="page__payees__list">
    <h3>
        Existing Payees
    </h3>

    @forelse($payees as $payee)
        <livewire:form.update.payee
            :payee="$payee"
            wire:key="payee-{{ $payee->id }}"
        />
    @empty
        <div class="empty">
            <p><em>No payees yet.</em></p>
        </div>
    @endforelse
</div>
