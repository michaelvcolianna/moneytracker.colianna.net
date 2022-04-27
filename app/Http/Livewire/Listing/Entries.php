<?php

namespace App\Http\Livewire\Listing;

use App\Models\Entry;
use App\Models\PayDate;
use Livewire\Component;

class Entries extends Component
{
    /**
     * Events the component listens for.
     *
     * @var array
     */
    protected $listeners = [
        'refreshEntries',
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->refreshEntries();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.listing.entries');
    }

    /**
     * Get the most recent list of payees.
     *
     * @return void
     */
    public function refreshEntries()
    {
        $payDate = session('paydate');

        $this->entries = $payDate && $payDate->entries
            ? $payDate->entries()->orderBy('payee')->get()
            : []
            ;
    }
}
