<div class="block block__add">
    <x-form.hidden title="Add Payee">
        <x-fields.payee :payee="$payee" />

        <div class="form__options field__months">
            <div class="options__info">
                <h4>
                    Months
                </h4>

                <button
                    type="button"
                    class="select-all {{ $areAnySelected ? '' : 'empty' }}"
                    wire:click="selectAll"
                >
                    <span>
                        {{ $areAnySelected ? 'Des' : 'S' }}elect All
                    </span>
                </button>
            </div>

            <div class="options__items">
                @foreach($options as $key => $name)
                    <x-form.field.boolean
                        id="month-{{ $key }}"
                        wire:model="payee.{{ $key }}"
                        wire:key="month-{{ $key }}"
                    >
                        {{ $name }}
                    </x-form.field.boolean>
                @endforeach
            </div>
        </div>

        <x-shared.save-button>
            Payee
        </x-shared.save-button>
    </x-form.hidden>
</div>
