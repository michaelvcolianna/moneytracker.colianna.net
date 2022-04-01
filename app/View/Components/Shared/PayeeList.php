<?php

namespace App\View\Components\Shared;

use App\Models\Payee;
use Illuminate\View\Component;

class PayeeList extends Component
{
    /** @var \Illuminate\Support\Collection */
    public $payees;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->payees = Payee::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.payee-list');
    }
}
