<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PayPeriod;

class PayPeriods extends Component
{
    public function render()
    {
        $pay_periods = PayPeriod::orderByDesc('date')->paginate(12);

        return view('livewire.pay-periods', [
            'pay_periods' => $pay_periods,
        ]);
    }
}
