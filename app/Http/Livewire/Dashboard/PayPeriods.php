<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayPeriod;

class PayPeriods extends Component
{
    use WithPagination;

    public function render()
    {
        // 36 bi-weekly = 52 weeks
        $pay_periods = PayPeriod::orderByDesc('date')->paginate(8);

        return view('dashboard.pay-periods', [
            'pay_periods' => $pay_periods,
        ]);
    }

    public function switchPayPeriod($id)
    {
        $pay_period = PayPeriod::where('id', $id)->first();

        return redirect()->route('dashboard', [
            'date' => $pay_period->date->format('Y-m-d'),
        ]);
    }
}
