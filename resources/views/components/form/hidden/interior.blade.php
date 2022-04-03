{{-- @todo Style form and remove x-show --}}
<div class="form__interior" x-show="open" @click.away="open = false">
    {{ $slot }}
</div>
