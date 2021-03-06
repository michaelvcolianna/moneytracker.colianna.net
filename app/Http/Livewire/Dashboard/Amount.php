<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Dashboard;

class Amount extends Dashboard
{
    protected $listeners = [
        'entries:refresh' => '$refresh',
    ];

    public function render()
    {
        $this->getPayPeriod();

        $this->pay_period->recalculateCurrentAmount();

        return view('dashboard.amount', [
            'status' => $this->pay_period->getAmountStatus(),
            'current' => $this->pay_period->getPrettyCurrent(),
            'start' => $this->pay_period->getPrettyStart(),
        ]);
    }
}
