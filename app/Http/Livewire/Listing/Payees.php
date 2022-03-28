<?php

namespace App\Http\Livewire\Listing;

use App\Models\Payee;
use Livewire\Component;

class Payees extends Component
{
    /**
     * Events the component listens for.
     *
     * @var array
     */
    protected $listeners = [
        'refreshPayees',
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->refreshPayees();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.listing.payees');
    }

    /**
     * Get the most recent list of payees.
     *
     * @return void
     */
    public function refreshPayees()
    {
        $this->payees = Payee::orderBy('name')->get();
    }
}
