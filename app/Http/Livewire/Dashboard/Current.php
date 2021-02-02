<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\PayPeriod;
use App\Models\Payee;
use App\Models\Entry;

class Current extends Component
{
    public $pay_period_id;
    public $payee_id;
    public $name;
    public $amount;
    public $scheduled;
    public $reconciled;

    protected $rules = [
        'pay_period_id' => 'required|exists:App\Models\PayPeriod,id',
        'payee_id' => 'nullable|required_without:name|exists:App\Models\Payee,id',
        'name' => 'nullable|required_without:payee_id|string',
        'amount' => 'required|numeric',
        'scheduled' => 'nullable|boolean',
        'reconciled' => 'nullable|boolean',
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

        $current = PayPeriod::where('date', $date->format('Y-m-d'))->first();
        $this->pay_period_id = $current->id;

        $payees = Payee::orderBy('name')->get();

        return view('dashboard.current', [
            'current' => $current,
            'payees' => $payees,
        ]);
    }

    public function addEntry()
    {
        $this->validate();

        Entry::create([
            'pay_period_id' => $this->pay_period_id,
            'payee_id' => $this->payee_id ?? null,
            'name' => $this->name ?? null,
            'amount' => $this->amount,
            'scheduled' => $this->scheduled ?? false,
            'reconciled' => $this->reconciled ?? false,
        ]);

        $this->payee_id = null;
        $this->name = null;
        $this->amount = null;
        $this->scheduled = null;
        $this->reconciled = null;

        $this->emit('entry:add');
    }
}
