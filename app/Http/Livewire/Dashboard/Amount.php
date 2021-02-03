<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\PayPeriod;

class Amount extends Component
{
    protected $listeners = [
        'entry:add' => '$refresh',
    ];

    public function render()
    {
        if(request()->has('date'))
        {
            $date = \DateTime::createFromFormat('Y-m-d', request()->date);
        }
        else
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
        }

        $pay_period = PayPeriod::where('date', $date->format('Y-m-d'))->first();
        $status = null;
        if($pay_period->current >= 1000)
        {
            $status = 'text-green-600';
        }
        if($pay_period->current < 0)
        {
            $status = 'text-red-600';
        }

        return view('dashboard.amount', [
            'date' => $pay_period->date->format('n/j/Y'),
            'status' => $status,
            'current' => $pay_period->getPrettyCurrent(),
            'start' => $pay_period->getPrettyStart(),
        ]);
    }
}
