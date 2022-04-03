<?php

namespace App\Http\Livewire;

use App\Models\PayDate;
use Livewire\Component;

class Navigation extends Component
{
    /** @var \App\Models\PayDate */
    public $payDate;

    /** @var string */
    public $current;
    public $date;
    public $rfc;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->payDate = PayDate::getCurrent();

        $this->current = $this->payDate->start->format('F j Y');
        $this->date = $this->payDate->start->format('Y-m-d');
        $this->rfc = $this->payDate->start->format('c');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.navigation');
    }
}
