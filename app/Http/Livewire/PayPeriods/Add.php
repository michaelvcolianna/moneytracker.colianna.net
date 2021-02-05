<?php

namespace App\Http\Livewire\PayPeriods;

use Livewire\Component;
use App\Models\PayPeriod;
use App\Models\Payee;

class Add extends Component
{
    public $date;
    public $start;
    public $schedule;

    protected $rules = [
        'date' => 'required|date_format:Y-m-d',
        'start' => 'nullable|numeric',
    ];

    public function render()
    {
        $payees = Payee::where('amount', '>', 0)->orderBy('name')->get();

        return view('pay-periods.add', [
            'payees' => $payees,
        ]);
    }

    public function addPayPeriod()
    {
        $this->validate();

        $pay_period = PayPeriod::create([
            'date' => $this->date,
            'start' => (!empty($this->start)) ? $this->start : 2000,
        ]);

        foreach($this->schedule as $payee_id => $schedule)
        {
            if($schedule)
            {
                $payee = Payee::where('id', $payee_id)->first();
                $payee->schedule($pay_period->id);
            }
        }

        $this->date = null;
        $this->start = null;
        $this->schedule = null;

        $this->emit('pay-periods:refresh');
    }
}
