<x-layout title="Payees">
    <div class="payees__add">
        <button type="button">
            <strong>Add Payee</strong>
            <span aria-hidden="true">&#10010;</span>
        </button>

        <div class="payees__add__form">
            <div class="field field--boolean field__active">
                <label>
                    <input id="new-active" type="checkbox" checked />
                    <span>Active</span>
                </label>
            </div>

            <div class="field field--input field__name">
                <label for="new-name">Name</label>
                <input id="new-name" type="text" value="ACCC" />
            </div>

            <div class="field field--input field__amount">
                <label for="new-amount">Schedule Amount</label>
                <input id="new-amount" type="number" step="0.01" />
            </div>

            <div class="field field--options field__months">
                <span class="label">Schedule Months</span>

                <label>
                    <input id="new-month-1" type="checkbox" />
                    <span>January</span>
                </label>

                <label>
                    <input id="new-month-2" type="checkbox" />
                    <span>February</span>
                </label>

                <label>
                    <input id="new-month-3" type="checkbox" />
                    <span>March</span>
                </label>

                <label>
                    <input id="new-month-4" type="checkbox" />
                    <span>April</span>
                </label>

                <label>
                    <input id="new-month-5" type="checkbox" />
                    <span>May</span>
                </label>

                <label>
                    <input id="new-month-6" type="checkbox" />
                    <span>June</span>
                </label>

                <label>
                    <input id="new-month-7" type="checkbox" />
                    <span>July</span>
                </label>

                <label>
                    <input id="new-month-8" type="checkbox" />
                    <span>August</span>
                </label>

                <label>
                    <input id="new-month-9" type="checkbox" />
                    <span>September</span>
                </label>

                <label>
                    <input id="new-month-10" type="checkbox" />
                    <span>October</span>
                </label>

                <label>
                    <input id="new-month-11" type="checkbox" />
                    <span>November</span>
                </label>

                <label>
                    <input id="new-month-12" type="checkbox" />
                    <span>December</span>
                </label>

                <button type="button" class="check-all">
                    <strong>Select All</strong>
                    <span aria-hidden="true">&#10033;</span>
                </button>
            </div>

            <div class="field field--input field__start">
                <label for="new-start">Schedule Start Day</label>
                <input id="new-start" type="number" step="1" min="1" max="31" />
            </div>

            <div class="field field--input field__end">
                <label for="new-end">Schedule End Day</label>
                <input id="new-end" type="number" step="1" min="1" max="31" />
            </div>

            <div class="button button--add">
                <button type="button">
                    <strong>Add Pay Period</strong>
                    <span aria-hidden="true">&#10095;</span>
                </button>
            </div>
        </div>
    </div>

    <div class="payees__list">
        <div class="payee" id="payee-1" aria-label="Payee">
            <div class="field field--boolean field__active">
                <label>
                    <input id="payee-1-active" type="checkbox" checked />
                    <span>Active</span>
                </label>
            </div>

            <div class="field field--input field__name">
                <label for="payee-1-name">Name</label>
                <input id="payee-1-name" type="text" value="ACCC" />
            </div>

            <div class="field field--input field__amount">
                <label for="payee-1-amount">Schedule Amount</label>
                <input id="payee-1-amount" type="number" step="0.01" value="500" />
            </div>

            <div class="field field--options field__months">
                <span class="label">Schedule Months</span>

                <label>
                    <input id="payee-1-month-1" type="checkbox" />
                    <span>January</span>
                </label>

                <label>
                    <input id="payee-1-month-2" type="checkbox" />
                    <span>February</span>
                </label>

                <label>
                    <input id="payee-1-month-3" type="checkbox" />
                    <span>March</span>
                </label>

                <label>
                    <input id="payee-1-month-4" type="checkbox" />
                    <span>April</span>
                </label>

                <label>
                    <input id="payee-1-month-5" type="checkbox" />
                    <span>May</span>
                </label>

                <label>
                    <input id="payee-1-month-6" type="checkbox" />
                    <span>June</span>
                </label>

                <label>
                    <input id="payee-1-month-7" type="checkbox" />
                    <span>July</span>
                </label>

                <label>
                    <input id="payee-1-month-8" type="checkbox" />
                    <span>August</span>
                </label>

                <label>
                    <input id="payee-1-month-9" type="checkbox" />
                    <span>September</span>
                </label>

                <label>
                    <input id="payee-1-month-10" type="checkbox" />
                    <span>October</span>
                </label>

                <label>
                    <input id="payee-1-month-11" type="checkbox" />
                    <span>November</span>
                </label>

                <label>
                    <input id="payee-1-month-12" type="checkbox" />
                    <span>December</span>
                </label>

                <button type="button" class="check-all">
                    <strong>Select All</strong>
                    <span aria-hidden="true">&#10033;</span>
                </button>
            </div>

            <div class="field field--input field__start">
                <label for="payee-1-start">Schedule Start Day</label>
                <input id="payee-1-start" type="number" step="1" min="1" max="31" />
            </div>

            <div class="field field--input field__end">
                <label for="payee-1-end">Schedule End Day</label>
                <input id="payee-1-end" type="number" step="1" min="1" max="31" />
            </div>
        </div>
    </div>
</x-layout>
