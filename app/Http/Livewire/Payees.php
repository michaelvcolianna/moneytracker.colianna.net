<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payee;

class Payees extends Component
{
    use WithPagination;

    public $name;
    public $amount;
    public $schedule;

    protected $listeners = [
        'payeeRefresh' => 'render',
    ];
    protected $rules = [
        'name' => 'required|string',
        'amount' => 'nullable|numeric',
        'schedule' => 'nullable|boolean',
    ];

    public function render()
    {
        $payees = Payee::orderBy('name')->paginate(16);

        return view('livewire.payees', [
            'payees' => $payees,
        ]);
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

        $this->emit('payeeRefresh');
    }

    public function editPayee($id)
    {
        return redirect()->route('payee', ['id' => $id]);
    }

    public function deletePayee($id)
    {
        Payee::find($id)->delete();

        $this->emit('payeeRefresh');
    }
}
