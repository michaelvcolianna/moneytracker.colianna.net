<?php

namespace App\Http\Livewire\Listing;

use App\Models\PayPeriod;
use Livewire\Component;

class PayPeriods extends Component
{
    /**
     * Events the component listens for.
     *
     * @var array
     */
    protected $listeners = [
        'refreshPayPeriods',
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->refreshPayPeriods();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.listing.pay-periods');
    }

    /**
     * Get the most recent list of pay periods.
     *
     * @return void
     */
    public function refreshPayPeriods()
    {
        $this->payPeriods = PayPeriod::orderByDesc('started_at')->get();
    }
}
