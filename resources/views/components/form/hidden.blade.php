@props(['title', 'submit' => 'save'])

<form
    class="form"
    :class="open && 'open'"
    wire:submit.prevent="{{ $submit }}"
    x-data="{ open: false }"
>
    <x-form.hidden.toggle :title="$title" />

    <x-form.hidden.interior>
        {{ $slot }}
    </x-form.hidden.interior>
</form>
