<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayPeriod;

class PayPeriods extends Component
{
    use WithPagination;

    public $date;
    public $start;
    public $deleteId;

    protected $listeners = [
        'payPeriodRefresh' => 'render',
    ];
    protected $rules = [
        'date' => 'required|date_format:Y-m-d',
        'start' => 'required|numeric',
    ];

    public function render()
    {
        // 36 bi-weekly = 52 weeks
        $pay_periods = PayPeriod::orderByDesc('date')->paginate(36);

        return view('livewire.pay-periods', [
            'pay_periods' => $pay_periods,
        ]);
    }

    public function addPayPeriod()
    {
        $this->validate();

        PayPeriod::create([
            'date' => $this->date,
            'start' => $this->start,
        ]);

        $this->date = null;
        $this->start = null;

        $this->emit('payPeriodRefresh');
    }

    public function editPayPeriod($id)
    {
        // @todo Redirect to edit page
        return redirect()->route('dashboard');
    }

    public function deletePayPeriod($id)
    {
        PayPeriod::find($id)->delete();

        $this->emit('payPeriodRefresh');
    }
}
