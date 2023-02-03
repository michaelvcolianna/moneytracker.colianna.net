<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Entries extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('pages.entries');
    }
}
