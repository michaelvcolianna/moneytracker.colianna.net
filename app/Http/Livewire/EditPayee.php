<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payee;

class EditPayee extends Component
{
    public $payee_id;
    public $name;
    public $amount;
    public $schedule;

    protected $rules = [
        'name' => 'required|string',
        'amount' => 'nullable|numeric',
        'schedule' => 'nullable|boolean',
    ];

    public function mount($id)
    {
        $payee = Payee::find($id)->first();

        $this->payee_id = $id;
        $this->name = $payee->name;
        $this->amount = $payee->getRawAmount() ?? null;
        $this->schedule = $payee->schedule ?? false;
    }

    public function render()
    {
        return view('livewire.edit-payee');
    }

    public function updatePayee()
    {
        $this->validate();

        Payee::find($this->payee_id)->update([
            'name' => $this->name,
            'amount' => $this->amount ?? null,
            'schedule' => $this->schedule ?? false,
        ]);

        $this->finishEdit();
    }

    public function finishEdit()
    {
        return redirect()->route('payees');
    }
}
