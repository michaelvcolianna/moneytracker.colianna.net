<?php

namespace App\Http\Livewire;

use App\Models\Payday;
use Livewire\Component;

class Forecast extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $frequency = config('app.frequency');
        $current = session('payday');

        $paydays[] = $current;

        for($n = 1; $n < 10; $n++)
        {
            $paydays[] = Payday::byDate(
                $current->start_date->copy()->addDays($n * $frequency)
            );
        }

        return view('pages.forecast', [
            'paydays' => $paydays,
        ]);
    }
}
