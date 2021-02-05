require('./bootstrap');

require('alpinejs');

let new_entry_amount = document.querySelector('#new-entry-amount'),
    edit_entry_amount = document.querySelector('#edit-entry-amount')
    new_pay_period_date = document.querySelector('#new-pay-period-date'),
    edit_pay_period_start = document.querySelector('#edit-pay-period-start')
    ;

if(new_entry_amount)
{
    Livewire.on('entry:new', entry => {
        setTimeout(() => {
            new_entry_amount.focus();
        }, 500);
    });
}

if(edit_entry_amount)
{
    Livewire.on('entry:edit', entry => {
        setTimeout(() => {
            edit_entry_amount.select();
        }, 500);
    });
}

if(new_pay_period_date)
{
    Livewire.on('pay-period:new', entry => {
        setTimeout(() => {
            new_pay_period_date.focus();
        }, 500);
    });
}

if(edit_pay_period_start)
{
    Livewire.on('pay-period:edit', entry => {
        setTimeout(() => {
            edit_pay_period_start.select();
        }, 500);
    });
}
