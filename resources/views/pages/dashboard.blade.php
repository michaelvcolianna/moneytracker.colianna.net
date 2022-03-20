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

    <div class="entries__add">
        <button type="button">
            <strong>Add Entry</strong>
            <span aria-hidden="true">&#10010;</span>
        </button>

        <div class="entries__add__form">
            <div class="field field--input field__amount">
                <label for="new-amount">Amount</label>
                <input id="new-amount" type="number" step="0.01" />
            </div>

            <div class="field field--input field__payee">
                <label for="new-payee">Payee</label>
                <input id="new-payee" type="text" />
            </div>

            <div class="field field--boolean field__scheduled">
                <label>
                    <input id="new-scheduled" type="checkbox" />
                    <span>Scheduled</span>
                </label>
            </div>

            <div class="field field--boolean field__reconciled">
                <label>
                    <input id="new-reconciled" type="checkbox" />
                    <span>Reconciled</span>
                </label>
            </div>

            <div class="button button--add">
                <button type="button">
                    <strong>Add Entry</strong>
                    <span aria-hidden="true">&#10095;</span>
                </button>
            </div>
        </div>
    </div>

    <div class="entries__list">
        <div class="entry" id="entry-1" aria-label="Entry">
            <div class="field field--input field__amount">
                <label for="entry-1-amount">Amount</label>
                <input id="entry-1-amount" type="number" step="0.01" value="10" />
            </div>

            <div class="field field--input field__payee">
                <label for="entry-1-payee">Payee</label>
                <input id="entry-1-payee" type="text" value="Disney+" />
            </div>

            <div class="field field--boolean field__scheduled">
                <label>
                    <input id="entry-1-scheduled" type="checkbox" />
                    <span>Scheduled</span>
                </label>
            </div>

            <div class="field field--boolean field__reconciled">
                <label>
                    <input id="entry-1-reconciled" type="checkbox" />
                    <span>Reconciled</span>
                </label>
            </div>

            <div class="button button--delete">
                <button type="button">
                    <strong>Delete Entry</strong>
                    <span aria-hidden="true">&#10006;</span>
                </button>
            </div>
        </div>

        <div class="entry entry--scheduled" id="entry-2" aria-label="Entry">
            <div class="field field--input field__amount">
                <label for="entry-2-amount">Amount</label>
                <input id="entry-2-amount" type="number" step="0.01" value="80" />
            </div>

            <div class="field field--input field__payee">
                <label for="entry-2-payee">Payee</label>
                <input id="entry-2-payee" type="text" value="Geico" />
            </div>

            <div class="field field--boolean field__scheduled">
                <label>
                    <input id="entry-2-scheduled" type="checkbox" checked />
                    <span>Scheduled</span>
                </label>
            </div>

            <div class="field field--boolean field__reconciled">
                <label>
                    <input id="entry-2-reconciled" type="checkbox" />
                    <span>Reconciled</span>
                </label>
            </div>

            <div class="button button--delete">
                <button type="button">
                    <strong>Delete Entry</strong>
                    <span aria-hidden="true">&#10006;</span>
                </button>
            </div>
        </div>

        <div class="entry" id="entry-3" aria-label="Entry">
            <div class="field field--input field__amount">
                <label for="entry-3-amount">Amount</label>
                <input id="entry-3-amount" type="number" step="0.01" value="230" />
            </div>

            <div class="field field--input field__payee">
                <label for="entry-3-payee">Payee</label>
                <input id="entry-3-payee" type="text" value="Southern CT Gas" />
            </div>

            <div class="field field--boolean field__scheduled">
                <label>
                    <input id="entry-3-scheduled" type="checkbox" checked />
                    <span>Scheduled</span>
                </label>
            </div>

            <div class="field field--boolean field__reconciled">
                <label>
                    <input id="entry-3-reconciled" type="checkbox" checked />
                    <span>Reconciled</span>
                </label>
            </div>

            <div class="button button--delete">
                <button type="button">
                    <strong>Delete Entry</strong>
                    <span aria-hidden="true">&#10006;</span>
                </button>
            </div>
        </div>
    </div>
</x-layout>
