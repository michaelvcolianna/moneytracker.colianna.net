<div>
    <label class="month">
        <input
            id="{{ $model }}{{ $prefix ? sprintf('.%s', $prefix) : ''}}"
            type="checkbox"
            wire:model.live="{{ $model }}"
        >

        <span>{{ $name }}</span>
    </label>
</div>
