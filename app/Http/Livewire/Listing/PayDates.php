<?php

namespace App\Http\Livewire\Listing;

use App\Models\PayDate as PayDateModel;
use Livewire\Component;

class PayDates extends Component
{
    /** @var array */
    public $payDates;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $current = PayDateModel::getCurrent();
        $this->payDates[$current->start->format('Y-m-d')] = $current;

        for($n = 1; $n < 10; $n++)
        {
            $future = PayDateModel::getCurrent(
                $current->start->copy()->addDays($n * 14)
            );
            $this->payDates[$future->start->format('Y-m-d')] = $future;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.listing.pay-dates');
    }
}
