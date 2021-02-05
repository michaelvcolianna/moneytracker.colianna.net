<?php

namespace App\Http\Livewire\Schedule;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayPeriod;
use App\Models\Payee;
use App\Models\Entry;

class Add extends Component
{
    use WithPagination;

    public $pay_period_id;
    public $date;
    public $next;
    public $schedule;
    public $modal;
    public $added;

    protected $pay_period;

    protected $rules = [
        'schedule' => 'min:1',
    ];

    protected $listeners = [
        'pay-periods:refresh' => '$refresh',
    ];

    public function render()
    {
        $pay_periods = PayPeriod::orderByDesc('date')->paginate(16);
        $pay_periods->each(function($pay_period, $key) {
            $pay_period->recalculateCurrentAmount();
        });
        $payees = Payee::where('amount', '>', 0)->orderBy('name')->get();

        return view('schedule.add', [
            'pay_periods' => $pay_periods,
            'payees' => $payees,
        ]);
    }

    public function openPayPeriod($id)
    {
        $this->getPayPeriod($id);

        $next = clone $this->pay_period->date;
        $next->modify('+13 days');

        $this->pay_period_id = $id;
        $this->date = $this->pay_period->date->format('n/j/Y');
        $this->next = $next->format('n/j/Y');
        $this->schedule = [];
        $this->modal = true;
        $this->added = false;
    }

    public function closePayPeriod()
    {
        $this->modal = false;

        $this->pay_period = null;

        $this->pay_period_id = null;
        $this->date = null;
        $this->schedule = null;
    }

    public function schedulePayPeriod()
    {
        $this->validate();

        foreach($this->schedule as $payee_id => $schedule)
        {
            if($schedule)
            {
                $payee = Payee::where('id', $payee_id)->first();
                $payee->schedule($this->pay_period_id);
            }
        }

        $this->closePayPeriod();

        $this->emit('pay-periods:refresh');

        $this->added = true;
    }

    protected function getPayPeriod($id)
    {
        $this->pay_period = PayPeriod::where('id', $id)->first();

        return $this;
    }
}
