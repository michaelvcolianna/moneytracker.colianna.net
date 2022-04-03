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
        $id = $payee->id ?? 'new';
        $this->prefix = $this->createPrefix('payee-' . $id);
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
