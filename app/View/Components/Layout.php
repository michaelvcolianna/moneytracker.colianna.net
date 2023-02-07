<?php

namespace App\View\Components;

use App\Models\Payday;
use Illuminate\View\Component;

class Layout extends Component
{
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
