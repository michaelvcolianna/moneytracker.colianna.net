<?php

namespace App\Http\Livewire;

use App\Models\PayDate;
use Livewire\Component;

class Navigation extends Component
{
    /** @var \App\Models\PayDate */
    public $payDate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->payDate = PayDate::getCurrent();
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
