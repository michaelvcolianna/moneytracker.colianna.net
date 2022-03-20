<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>design</title>
        <link rel="stylesheet" href="{{ mix('storage/assets/css/app.css') }}" />
        <script src="{{ mix('storage/assets/js/app.js') }}" defer></script>
    </head>

    <body>
        <div class="wrapper">
            <header>
                <a href="/" class="branding">MoneyTracker</a>

                @if(request()->has('login'))
                    <nav aria-label="Areas">
                        <ul>
                            <li>
                                <a href="/?login&dashboard">Dashboard</a>
                            </li>

                            <li>
                                <a href="/?login&payperiods">Pay Periods</a>
                            </li>

                            <li>
                                <a href="/?login&payees">Payees</a>
                            </li>

                            <li>
                                <a href="/">Log Out</a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </header>

            <main>
                <section class="page__title">
                    @if(request()->has(['login', 'dashboard']))
                        <h1>Dashboard</h1>
                    @elseif(request()->has(['login', 'payperiods']))
                        <h1>Pay Periods</h1>
                    @elseif(request()->has(['login', 'payees']))
                        <h1>Payees</h1>
                    @else
                        <h1>Login</h1>
                    @endif
                </section>

                @if(request()->has('errors'))
                    <section class="page__errors" role="alert">
                        <h3>Errors</h3>

                        <p>The following errors occurred:</p>

                        <ul>
                            <li>First</li>
                            <li>Second</li>
                            <li>Third</li>
                        </ul>
                    </section>
                @endif

                @if(request()->has('status'))
                    <section class="page__status" role="dialog">
                        <p>Status message here.</p>
                    </section>
                @endif

                <section class="page entries payperiods login">
                    @if(request()->has(['login', 'dashboard']))
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
                    @elseif(request()->has(['login', 'payperiods']))
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
                    @elseif(request()->has(['login', 'payees']))
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
                    @else
                        <div class="login__form">
                            <div class="field field--input field__username">
                                <label for="username">Username</label>
                                <input id="username" type="text" autocomplete="nickname" />
                                @if(request()->has('errors'))
                                    <em role="alert">Error message.</em>
                                @endif
                            </div>

                            <div class="field field--input field__password">
                                <label for="password">Password</label>
                                <input id="password" type="password" />
                                @if(request()->has('errors'))
                                    <em role="alert">Error message.</em>
                                @endif
                            </div>

                            <div class="field field--boolean field__remember">
                                <label>
                                    <input id="remember" type="checkbox" />
                                    <span>Remember Me</span>
                                </label>
                            </div>

                            <div class="button button--submit">
                                <button type="button">
                                    <strong>Log In</strong>
                                    <span aria-hidden="true">&#10095;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </section>
            </main>

            <footer>
                &copy; 2019-2022 | <a href="#">Source Code Link</a> | Current Git hash | <a href="/?login&dashboard">Log In</a>
            </footer>
        </div>
    </body>
</html>
