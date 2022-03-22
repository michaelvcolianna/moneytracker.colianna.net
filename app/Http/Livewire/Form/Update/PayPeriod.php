<?php

namespace App\Http\Livewire\Form\Update;

use Livewire\Component;

class PayPeriod extends Component
{
    /** @var string */
    public $amount;
    public $date;
    public $num;

    /**
     * Create a new component instance.
     *
     * @param  string  $amount
     * @param  string  $date
     * @param  string  $num
     * @return void
     */
    public function mount($amount, $date, $num)
    {
        $this->amount = $amount;
        $this->date = $date;
        $this->num = $num;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.update.pay-period');
    }
}