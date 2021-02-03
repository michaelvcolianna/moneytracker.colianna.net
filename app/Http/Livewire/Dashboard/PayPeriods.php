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
        $date = new \DateTime;

        if($date->format('w') != 5)
        {
            $date->modify('last friday');
        }

        $limit = 0;
        while(PayPeriod::where('date', $date->format('Y-m-d'))->count() == 0)
        {
            $date->modify('-1 week');

            // Don't look back further than 8 weeks
            if($limit > 4)
            {
                abort(404);
            }

            $limit++;
        }

        $pay_periods = PayPeriod::where('date', '>=', $date->format('Y-m-d'))->orderBy('date')->take(12)->get();

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
