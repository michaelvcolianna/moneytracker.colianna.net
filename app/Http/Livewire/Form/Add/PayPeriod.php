<?php

namespace App\Http\Livewire\Form\Add;

use Livewire\Component;

class PayPeriod extends Component
{
    /** @var boolean */
    public $isFormShowing;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.add.pay-period');
    }
}
