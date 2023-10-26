<?php

namespace App\Livewire;

use App\Models\Payday;
use Closure;
use Illuminate\View\View;
use Livewire\Component;

class Forecast extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $current = session('payday');

        $paydays = [];

        for($n = 0; $n < 10; $n++)
        {
            $paydays[] = $current;
            $current = $current->newer();
        }

        return view('pages.forecast', [
            'paydays' => $paydays,
        ]);
    }
}
