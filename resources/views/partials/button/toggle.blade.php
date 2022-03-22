<button type="button" class="primary form-toggle {{ $isFormShowing ? 'open' : '' }}" wire:click="$toggle('isFormShowing')">
    <span>Add {{ $label }}</span>
    <x-shared.icon name="chevron-down" aria-hidden="true" />
</button>
