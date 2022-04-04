<div class="block block__listing">
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
            <em>No payees yet.</em>
        </div>
    @endforelse
</div>
