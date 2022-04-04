<?php

namespace App\View\Components\Fields;

use App\View\Components\Fields;

class PayPeriod extends Fields
{
    /**
     * Create a new component instance.
     *
     * @param  \App\Models\PayPeriod  $payPeriod
     * @return void
     */
    public function __construct($payPeriod)
    {
        $this->setValues($payPeriod, 'pay-period');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.pay-period');
    }
}
