<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PayPeriod;

class EditPayPeriod extends Component
{
    public $pay_period_id;
    public $date;
    public $start;

    protected $rules = [
        'pay_period_id' => 'required|numeric',
        'start' => 'required|numeric',
    ];

    public function mount($id)
    {
        $pay_period = PayPeriod::find($id)->first();

        $this->pay_period_id = $id;
        $this->date = $pay_period->date->format('n/j/Y');
        $this->start = $pay_period->getRawStart();
    }

    public function render()
    {
        return view('livewire.edit-pay-period');
    }

    public function updatePayPeriod()
    {
        $this->validate();

        PayPeriod::find($this->pay_period_id)->update([
            'start' => $this->start,
        ]);

        $this->finishEdit();
    }

    public function finishEdit()
    {
        return redirect()->route('pay-periods');
    }
}
