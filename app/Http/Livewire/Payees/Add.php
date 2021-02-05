<?php

namespace App\Http\Livewire\Payees;

use Livewire\Component;
use App\Models\Payee;

class Add extends Component
{
    public $name;
    public $amount;
    public $schedule;

    protected $rules = [
        'name' => 'required|string',
        'amount' => 'nullable|required_with:schedule|numeric',
        'schedule' => 'nullable|boolean',
    ];

    public function render()
    {
        return view('payees.add');
    }

    public function addPayee()
    {
        $this->validate();

        Payee::create([
            'name' => $this->name,
            'amount' => $this->amount ?? null,
            'schedule' => $this->schedule ?? false,
        ]);

        $this->name = null;
        $this->amount = null;
        $this->schedule = null;

        $this->emit('payees:refresh');
    }
}
