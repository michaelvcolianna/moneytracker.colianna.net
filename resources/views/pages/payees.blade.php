<div>
    <div>Payees</div>

    <div x-data="{ showingForm: @entangle('showingForm') }">
        <button type="button" @click="
            showingForm = !showingForm
            $nextTick(() => $refs.name.focus())
        ">
            Add new entry
        </button>

        <div x-cloak x-show="showingForm" @click.outside="showingForm = false">
            <x-shared.errors />

            <form wire:submit.prevent="addPayee">
                <div>
                    <label for="new.name">Name</label>

                    <input
                        id="new.name"
                        type="text"
                        wire:model.defer="new.name"
                        x-ref="name"
                    >
                </div>

                <div>
                    <label for="new.schedule_amount">Schedule Amount</label>

                    <input
                        id="new.schedule_amount"
                        type="text"
                        wire:model.defer="new.schedule_amount"
                    >
                </div>

                <div>
                    <label for="new.earliest_day">Earliest Day</label>

                    <input
                        id="new.earliest_day"
                        type="text"
                        wire:model.defer="new.earliest_day"
                    >
                </div>

                <div>
                    <label for="new.latest_day">Latest Day</label>

                    <input
                        id="new.latest_day"
                        type="text"
                        wire:model.defer="new.latest_day"
                    >
                </div>

                <div>
                    <label>
                        <input
                            id="new.auto_schedule"
                            type="checkbox"
                            wire:model.defer="new.auto_schedule"
                        >

                        <span>Auto-schedule amount on months:</span>
                    </label>
                </div>

                <div>
                    <div>
                        @foreach(range(1, 12) as $number)
                            <x-payee.month prefix="new" :number="$number" />
                        @endforeach
                    </div>

                    <button type="button" wire:click="toggleAllMonths">
                        Select/Deselect All
                    </button>
                </div>

                <div>
                    <button type="submit">Add Payee</button>

                    <button type="reset" wire:click="clearFields">Clear</button>
                </div>
            </form>
        </div>
    </div>

    @if($payees->isNotEmpty())
        <ul>
            @foreach($payees as $payee)
                <livewire:single-payee
                    key="payee-{{ $payee->id }}"
                    :payee="$payee"
                />
            @endforeach
        </ul>
    @else
        <div>No payees.</div>
    @endif
</div>
