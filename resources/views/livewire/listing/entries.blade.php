<div class="block block__listing">
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
            <em>No entries yet.</em>
        </div>
    @endforelse
</div>
