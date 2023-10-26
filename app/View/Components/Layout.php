<?php

namespace App\View\Components;

use App\Models\Payday;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
   /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layout');
    }
}
