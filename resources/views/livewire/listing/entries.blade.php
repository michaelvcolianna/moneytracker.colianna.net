<div class="entries__list">
    <div class="legend legend--entries" aria-hidden="true">
        <strong class="legend__amount">Amount</strong>
        <strong class="legend__payee">Payee</strong>
        <strong class="legend__scheduled">Scheduled</strong>
        <strong class="legend__reconciled">Reconciled</strong>
        <strong class="legend__delete">Delete</strong>
    </div>

    @forelse($entries as $entry)
        <livewire:form.update.entry :entry="$entry" wire:key="entry-{{ $entry->id }}" />
    @empty
        <div class="empty">
            <p><em>No entries yet.</em></p>
        </div>
    @endforelse
</div>
