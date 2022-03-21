<x-layout title="Dashboard">
    <nav aria-label="Pay dates">
        <ul>
            <li class="previous">
                <a href="#" rel="prev" aria-label="Previous pay date: March 4 2022">
                    <span aria-hidden="true">&laquo;</span>
                    <time datetime="2022-03-04T00:00:00-04:00">2022-03-04</time>
                </a>
            </li>

            <li class="current">
                <time datetime="2022-03-18T00:00:00-04:00" aria-current="page" aria-label="Current pay date: March 18 2022">2022-03-18</span>
            </li>

            <li class="next">
                <a href="#" rel="next" aria-label="Next pay date: April 1 2022">
                    <time datetime="2022-04-01T00:00:00-04:00">2022-04-01</time>
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="entries__amount" aria-label="Pay date amount">
        <div class="current">$1,500.00</div>

        <div class="total">of $2,000.00</div>
    </div>

    <livewire:form.add.entry />

    <div class="entries__list">
        <div class="legend legend--entries" aria-hidden="true">
            <strong class="legend__amount">Amount</strong>
            <strong class="legend__payee">Payee</strong>
            <strong class="legend__scheduled">Scheduled</strong>
            <strong class="legend__reconciled">Reconciled</strong>
            <strong class="legend__delete">Delete</strong>
        </div>

        <livewire:form.update.entry num="3" amount="10" payee="Disney+" />
        <livewire:form.update.entry num="2" amount="80" payee="Geico" />
        <livewire:form.update.entry num="1" amount="230" payee="Southern CT Gas" />
    </div>
</x-layout>
