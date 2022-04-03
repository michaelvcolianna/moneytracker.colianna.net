<div class="page__dashboard__list">
    <h3>
        Entries For This Date
    </h3>

    @forelse($entries as $entry)
        <livewire:form.update.entry
            :entry="$entry"
            wire:key="entry-{{ $entry->id }}"
        />
    @empty
        <div class="empty">
            <p><em>No entries yet.</em></p>
        </div>
    @endforelse
</div>
