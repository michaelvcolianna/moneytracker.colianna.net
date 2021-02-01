<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PayPeriod;

class Dashboard extends Component
{
    public function mount()
    {
        if(PayPeriod::all()->count() < 1)
        {
            return redirect()->route('pay-periods');
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
