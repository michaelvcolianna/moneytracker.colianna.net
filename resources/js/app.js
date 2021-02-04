require('./bootstrap');

require('alpinejs');

let new_amount = document.querySelector('#new-amount'),
    edit_amount = document.querySelector('#edit-amount')
    ;

if(new_amount)
{
    Livewire.on('entry:new', entry => {
        setTimeout(() => {
            new_amount.focus();
        }, 500);
    });
}

if(edit_amount)
{
    Livewire.on('entry:edit', entry => {
        setTimeout(() => {
            edit_amount.select();
        }, 500);
    });
}
