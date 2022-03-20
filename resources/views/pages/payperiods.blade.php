<x-layout title="Pay Periods">
    <div class="payperiods__add">
        <button type="button">
            <strong>Add Pay Period</strong>
            <span aria-hidden="true">&#10010;</span>
        </button>

        <div class="payperiods__add__form">
            <div class="field field--input field__date">
                <label for="new-date">Starting Date</label>
                <input id="new-date" type="date" />
            </div>

            <div class="field field--input field__amount">
                <label for="new-amount">Amount</label>
                <input id="new-amount" type="number" step="0.01" />
            </div>

            <div class="field field--boolean field__biweekly">
                <label>
                    <input id="new-biweekly" type="checkbox" />
                    <span>Biweekly</span>
                </label>
            </div>

            <div class="button button--add">
                <button type="button">
                    <strong>Add Pay Period</strong>
                    <span aria-hidden="true">&#10095;</span>
                </button>
            </div>
        </div>
    </div>

    <div class="payperiods__list">
        <div class="payperiod" id="payperiod-1" aria-label="Pay period">
            <div class="field field--input field__date">
                <label for="payperiod-1-date">Starting Date</label>
                <input id="payperiod-1-date" type="date" />
            </div>

            <div class="field field--input field__amount">
                <label for="payperiod-1-amount">Amount</label>
                <input id="payperiod-1-amount" type="number" step="0.01" value="2000" />
            </div>

            <div class="field field--boolean field__biweekly">
                <label>
                    <input id="payperiod-1-biweekly" type="checkbox" checked />
                    <span>Biweekly</span>
                </label>
            </div>
        </div>
    </div>
</x-layout>
