<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PayPeriod;
use App\Models\Payee;

class Dashboard extends Component
{
    public $date;
    public $payee_id;
    public $name;
    public $amount;
    public $scheduled;
    public $reconciled;

    protected $pay_period;
    protected $payees;

    protected $rules = [
        'payee_id' => 'nullable|required_without:name|exists:App\Models\Payee,id',
        'name' => 'nullable|required_without:payee_id|string',
        'amount' => 'required|numeric',
        'scheduled' => 'nullable|boolean',
        'reconciled' => 'nullable|boolean',
    ];

    protected function getPayPeriod()
    {
        $this->pay_period = PayPeriod::where('date', $this->date)->first();

        return $this;
    }

    protected function getPayees()
    {
        $this->payees = Payee::orderBy('name')->get();

        return $this;
    }
}
