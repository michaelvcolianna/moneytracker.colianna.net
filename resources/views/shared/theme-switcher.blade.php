<button type="button" @class(['theme', 'dark' => $dark]) wire:click="switchTheme">
    <span>{{ $dark ? 'Light' : 'Dark' }}</span>
</button>
