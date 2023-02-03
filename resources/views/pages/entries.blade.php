<div>
    <nav>
        <x-entries.link :date="$payday->older()">
            <x-entries.date-label :date="$payday->older()" />
        </x-entries.link>

        <x-entries.date-label :date="$payday->start_date" />

        <x-entries.link :date="$payday->newer()">
            <x-entries.date-label :date="$payday->newer()" />
        </x-entries.link>
    </nav>

    <div>@dump($payday)</div>
</div>
