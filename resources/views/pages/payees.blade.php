<div class="payees-list">
    <div
        class="add-payee"
        :class="showingForm && 'expanded'"
        x-data="{ showingForm: @entangle('showingForm') }"
    >
        <a class="button" href="#add" @click.prevent="
            showingForm = !showingForm
            $nextTick(() => $refs.name.focus())
        ">
            <svg class="expand" aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M32 32C14.3 32 0 46.3 0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7 14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V352zM320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32h64v64c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H320zM448 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32V352z"/></svg>
            <svg class="compress" aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M160 64c0-17.7-14.3-32-32-32s-32 14.3-32 32v64H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32V64zM32 320c-17.7 0-32 14.3-32 32s14.3 32 32 32H96v64c0 17.7 14.3 32 32 32s32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zM352 64c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7 14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H352V64zM320 320c-17.7 0-32 14.3-32 32v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H320z"/></svg>
            Add new payee
        </a>

        <div class="form" @click.outside="showingForm = false">
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

                <div class="days">
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
                </div>

                <div class="auto">
                    <label>
                        <input
                            id="new.auto_schedule"
                            type="checkbox"
                            wire:model.defer="new.auto_schedule"
                        >

                        <span>Auto-schedule amount on months:</span>
                    </label>
                </div>

                <div class="months">
                    <div class="checkboxes">
                        @foreach(range(1, 12) as $number)
                            <x-payee.month prefix="new" :number="$number" />
                        @endforeach
                    </div>

                    <a
                        class="button"
                        href="#months"
                        wire:click.prevent="toggleAllMonths"
                    >
                        <svg aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M184.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L39 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L39 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM256 96c0-17.7 14.3-32 32-32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H288c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H288c-17.7 0-32-14.3-32-32zM192 416c0-17.7 14.3-32 32-32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32zM80 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z"/></svg>
                        Select/Deselect All
                    </a>
                </div>

                <div>
                    <button class="primary" type="submit">Add Payee</button>

                    <button type="reset" wire:click="clearFields">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <div class="header">List of payees</div>

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
        <div class="empty">No payees.</div>
    @endif
</div>
