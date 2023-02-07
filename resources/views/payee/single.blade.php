<li>
    <x-shared.errors />

    <div>
        <label for="payee.name">Name</label>

        <input
            id="payee.name"
            type="text"
            wire:model="payee.name"
            x-ref="name"
        >
    </div>

    <div>
        <label for="payee.schedule_amount">Schedule Amount</label>

        <input
            id="payee.schedule_amount"
            type="text"
            wire:model="payee.schedule_amount"
        >
    </div>

    <div class="days">
        <div>
            <label for="payee.earliest_day">Earliest Day</label>

            <input
                id="payee.earliest_day"
                type="text"
                wire:model="payee.earliest_day"
            >
        </div>

        <div>
            <label for="payee.latest_day">Latest Day</label>

            <input
                id="payee.latest_day"
                type="text"
                wire:model="payee.latest_day"
            >
        </div>
    </div>

    <div>
        <label class="auto">
            <input
                id="payee.auto_schedule"
                type="checkbox"
                wire:model="payee.auto_schedule"
            >

            <span>Auto-schedule amount on months:</span>
        </label>
    </div>

    <div class="months">
        <div class="checkboxes">
            @foreach(range(1, 12) as $number)
                <x-payee.month prefix="payee" :number="$number" />
            @endforeach
        </div>

        <a class="button" href="#months" wire:click.prevent="toggleAllMonths">
            <svg aria-hidden="true" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M184.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L39 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L39 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM256 96c0-17.7 14.3-32 32-32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H288c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H288c-17.7 0-32-14.3-32-32zM192 416c0-17.7 14.3-32 32-32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32zM80 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z"/></svg>
            Select/Deselect All
        </a>
    </div>

    <div
        class="delete-payee"
        :class="confirmingDelete && 'expanded'"
        x-data="{ confirmingDelete: @entangle('confirmingDelete') }"
    >
        <div class="remove">
            <button
                type="button"
                :class="confirmingDelete && 'ghost'"
                @click.prevent="confirmingDelete = !confirmingDelete"
            >
                Delete Payee
            </button>
        </div>

        <div
            class="confirm"
            @click.outside="confirmingDelete = false"
        >
            <button
                class="danger"
                type="button"
                wire:click.prevent="deletePayee"
            >
                Confirm Delete
            </button>
        </div>
    </div>
</li>
