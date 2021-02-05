<?php

namespace App\Http\Livewire\PayPeriods;

use Livewire\Component;
use App\Models\PayPeriod;

class Add extends Component
{
    public $date;
    public $start;

    protected $rules = [
        'date' => 'required|date_format:Y-m-d',
        'start' => 'nullable|numeric',
    ];

    public function render()
    {
        return view('pay-periods.add');
    }

    public function addPayPeriod()
    {
        $this->validate();

        PayPeriod::create([
            'date' => $this->date,
            'start' => (!empty($this->start)) ? $this->start : 2000,
        ]);

        $this->date = null;
        $this->start = null;

        $this->emit('pay-periods:refresh');
    }
}
