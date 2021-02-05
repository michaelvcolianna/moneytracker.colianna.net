require('./bootstrap');

require('alpinejs');

let new_entry_amount = document.querySelector('#new-entry-amount'),
    edit_entry_amount = document.querySelector('#edit-entry-amount')
    edit_pay_period_start = document.querySelector('#edit-pay-period-start'),
    edit_payee_name = document.querySelector('#edit-payee-name')
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

if(edit_pay_period_start)
{
    Livewire.on('pay-period:edit', entry => {
        setTimeout(() => {
            edit_pay_period_start.select();
        }, 500);
    });
}

if(edit_payee_name)
{
    Livewire.on('payee:edit', entry => {
        setTimeout(() => {
            edit_payee_name.select();
        }, 500);
    });
}
