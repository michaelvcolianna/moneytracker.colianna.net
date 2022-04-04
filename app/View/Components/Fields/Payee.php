<?php

namespace App\View\Components\Fields;

use App\View\Components\Fields;

class Payee extends Fields
{
    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Payee  $payee
     * @return void
     */
    public function __construct($payee)
    {
        $this->setValues($payee, 'payee');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.payee');
    }
}
