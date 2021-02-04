<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Dashboard;
use Livewire\WithPagination;
use App\Models\PayPeriod;

class PayPeriods extends Dashboard
{
    use WithPagination;

    public function render()
    {
        $pay_periods = [
            'older' => PayPeriod::where('date', '<', $this->date)->orderByDesc('date')->take(1)->first(),
            'current' => PayPeriod::where('date', $this->date)->first(),
            'newer' => PayPeriod::where('date', '>', $this->date)->orderBy('date')->take(1)->first(),
        ];

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
