<div>
    <label class="month">
        <input
            id="{{ $model }}"
            type="checkbox"
            wire:model.live="{{ $model }}"
        >

        <span>{{ $name }}</span>
    </label>
</div>
