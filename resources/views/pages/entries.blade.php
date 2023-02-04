<div>
    <nav>
        <x-entries.link :date="session('payday')->older()">
            <x-entries.date-label :date="session('payday')->older()" />
        </x-entries.link>

        <x-entries.date-label :date="session('payday')->start_date" />

        <x-entries.link :date="session('payday')->newer()">
            <x-entries.date-label :date="session('payday')->newer()" />
        </x-entries.link>
    </nav>

    <livewire:payday-amount />

    <div x-data="{ showingForm: @entangle('showingForm') }">
        <button type="button" @click="
            showingForm = !showingForm
            $nextTick(() => $refs.payee.focus())
        ">
            Add new entry
        </button>

        <div x-show="showingForm" @click.outside="showingForm = false">
            <x-shared.errors />

            <form wire:submit.prevent="addEntry">
                <div>
                    <label for="new.payee">Payee</label>

                    <input
                        id="new.payee"
                        type="text"
                        wire:model.defer="new.payee"
                        x-ref="payee"
                    >
                </div>

                <div>
                    <label for="new.amount">Amount</label>

                    <input
                        id="new.amount"
                        type="text"
                        wire:model.defer="new.amount"
                    >
                </div>

                <div>
                    <label>
                        <input
                            id="new.scheduled"
                            type="checkbox"
                            wire:model.defer="new.scheduled"
                        >

                        <span>Scheduled</span>
                    </label>
                </div>

                <div>
                    <label>
                        <input
                            id="new.reconciled"
                            type="checkbox"
                            wire:model.defer="new.reconciled"
                        >

                        <span>Reconciled</span>
                    </label>
                </div>

                <div>
                    <button type="submit">Add Entry</button>

                    <button type="reset" wire:click="clearFields">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <div>
        @if(session('payday')->entries->isNotEmpty())
            <ul>
                @foreach(session('payday')->sortedEntries() as $entry)
                    <livewire:single-entry
                        key="entry-{{ $entry->id }}"
                        :entry="$entry"
                    />
                @endforeach
            </ul>
        @else
            <div>No entries for this payday.</div>
        @endif
    </div>
</div>
