<?php

namespace App\View\Components;

use App\Models\Payday;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Set the payday in the session for Livewire use
        session([
            'payday' => Payday::byDate(),
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout');
    }
}
