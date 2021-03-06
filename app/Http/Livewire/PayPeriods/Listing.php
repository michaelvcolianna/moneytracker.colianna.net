<?php

namespace App\Http\Livewire\PayPeriods;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayPeriod;

// Can't be 'List' :/
class Listing extends Component
{
    use WithPagination;

    public $pay_period_id;
    public $date;
    public $start;
    public $delete;
    public $modal;

    protected $pay_period;

    protected $rules = [
        'start' => 'nullable|numeric',
    ];

    protected $listeners = [
        'pay-periods:refresh' => '$refresh',
    ];

    public function render()
    {
        $pay_periods = PayPeriod::orderByDesc('date')->paginate(8);
        $pay_periods->each(function($pay_period, $key) {
            $pay_period->recalculateCurrentAmount();
        });

        return view('pay-periods.listing', [
            'pay_periods' => $pay_periods,
        ]);
    }

    public function openPayPeriod($id)
    {
        $this->getPayPeriod($id);

        $this->pay_period_id = $id;
        $this->date = $this->pay_period->date->format('n/j/Y');
        $this->start = $this->pay_period->start;
        $this->delete = false;

        $this->modal = true;

        $this->emit('pay-period:edit');
    }

    public function closePayPeriod()
    {
        $this->modal = false;

        $this->pay_period = null;

        $this->pay_period_id = null;
        $this->date = null;
        $this->start = null;
        $this->delete = false;
    }

    public function updatePayPeriod()
    {
        $this->validate();

        $this->getPayPeriod($this->pay_period_id);

        $this->pay_period->update([
            'start' => (!empty($this->start)) ? $this->start : 2000,
        ]);

        $this->emit('pay-periods:refresh');

        $this->closePayPeriod();
    }

    public function deletePayPeriod()
    {
        $this->getPayPeriod($this->pay_period_id);

        $this->pay_period->delete();

        $this->emit('pay-periods:refresh');

        $this->closePayPeriod();
    }

    protected function getPayPeriod($id)
    {
        $this->pay_period = PayPeriod::where('id', $id)->first();

        return $this;
    }

    public function switchPayPeriod($id)
    {
        $pay_period = PayPeriod::where('id', $id)->first();

        return redirect()->route('dashboard', [
            'date' => $pay_period->date->format('Y-m-d'),
        ]);
    }
}
