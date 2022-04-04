@props(['title', 'submit' => 'save'])

<form
    class="form form--hidden"
    :class="open && 'open'"
    wire:submit.prevent="{{ $submit }}"
    x-data="{ open: false }"
>
    <x-form.hidden.toggle />

    <x-form.hidden.interior :title="$title">
        {{ $slot }}
    </x-form.hidden.interior>
</form>
