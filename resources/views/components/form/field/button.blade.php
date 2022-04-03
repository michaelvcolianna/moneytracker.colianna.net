<div class="form__button">
    <button {{ $attributes->merge(['type' => 'submit']) }}>
        <span>{{ $slot }}</span>
    </button>
</div>
