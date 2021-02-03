<?php

namespace App\Http\Livewire\PayPeriods;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayPeriod;

class Listing extends Component
{
    use WithPagination;

    public $edit_id;
    public $date;
    public $start;

    protected $rules = [
        'start' => 'required|numeric',
    ];

    protected $listeners = [
        'pay_period:add' => '$refresh',
    ];

    public function render()
    {
        // 36 bi-weekly = 52 weeks
        $pay_periods = PayPeriod::orderByDesc('date')->paginate(4);

        return view('pay-periods.listing', [
            'pay_periods' => $pay_periods,
        ]);
    }

    public function openPayPeriod($id)
    {
        $pay_period = PayPeriod::where('id', $id)->first();
        $this->edit_id = $pay_period->id;
        $this->date = $pay_period->date->format('n/j/Y');
        $this->start = $pay_period->start;
    }

    public function closePayPeriod()
    {
        $this->edit_id = null;
    }

    public function updatePayPeriod()
    {
        $this->validate();

        // @todo Recalculate the current amount

        PayPeriod::find($this->edit_id)->update([
            'start' => $this->start,
        ]);

        $this->closePayPeriod();
    }

    public function deletePayPeriod()
    {
        PayPeriod::find($this->edit_id)->delete();

        $this->closePayPeriod();
    }
}
