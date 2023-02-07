<div class="entries">
    <nav>
        <x-entries.link :date="session('payday')->older()">
            <svg aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
            <x-entries.date-label :date="session('payday')->older()" />
        </x-entries.link>

        <x-entries.date-label :date="session('payday')->start_date" />

        <x-entries.link :date="session('payday')->newer()">
            <x-entries.date-label :date="session('payday')->newer()" />
            <svg aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
        </x-entries.link>
    </nav>

    <livewire:payday-amount />

    <div
        class="add-entry"
        :class="showingForm && 'expanded'"
        x-data="{ showingForm: @entangle('showingForm') }"
    >
        <a class="button" href="#add" @click.prevent="
            showingForm = !showingForm
            $nextTick(() => $refs.payee.focus())
        ">
            <svg class="expand" aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M32 32C14.3 32 0 46.3 0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7 14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V352zM320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32h64v64c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H320zM448 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32V352z"/></svg>
            <svg class="compress" aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M160 64c0-17.7-14.3-32-32-32s-32 14.3-32 32v64H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32V64zM32 320c-17.7 0-32 14.3-32 32s14.3 32 32 32H96v64c0 17.7 14.3 32 32 32s32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zM352 64c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7 14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H352V64zM320 320c-17.7 0-32 14.3-32 32v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H320z"/></svg>
            Add new entry
        </a>

        <div
            class="form"
            @click.outside="showingForm = false"
        >
            <x-shared.errors />

            <form wire:submit.prevent="addEntry">
                <div>
                    <label for="new.payee">Payee</label>

                    <input
                        id="new.payee"
                        type="text"
                        wire:model.defer="new.payee"
                        list="payees-list"
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

                <div class="checkboxes">
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
                </div>

                <div class="buttons">
                    <button class="primary" type="submit">Add Entry</button>

                    <button type="reset" wire:click="clearFields">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <div class="entries-list">
        @if(session('payday')->entries->isNotEmpty())
            <div class="header">Entries for this date</div>

            <ul>
                @foreach(session('payday')->sortedEntries() as $entry)
                    <livewire:single-entry
                        key="entry-{{ $entry->id }}"
                        :entry="$entry"
                    />
                @endforeach
            </ul>
        @else
            <div class="empty">No entries for this payday.</div>
        @endif
    </div>

    <datalist id="payees-list">
        @foreach(App\Models\Payee::all() as $payee)
            <option value="{{ $payee->name }}" />
        @endforeach
    </datalist>
</div>
