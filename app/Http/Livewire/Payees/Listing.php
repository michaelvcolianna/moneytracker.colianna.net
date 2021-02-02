<?php

namespace App\Http\Livewire\Payees;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payee;

class Listing extends Component
{
    use WithPagination;

    public $edit_id;
    public $name;
    public $amount;
    public $schedule;

    protected $rules = [
        'name' => 'required|string',
        'amount' => 'nullable|numeric',
        'schedule' => 'nullable|boolean',
    ];

    protected $listeners = [
        'payee:add' => '$refresh',
    ];

    public function render()
    {
        $payees = Payee::orderBy('name')->paginate(8);

        return view('payees.listing', [
            'payees' => $payees,
        ]);
    }

    public function openPayee($id)
    {
        $payee = Payee::where('id', $id)->first();
        $this->edit_id = $payee->id;
        $this->name = $payee->name;
        $this->amount = $payee->amount ?? null;
        $this->schedule = $payee->schedule ?? false;
    }

    public function closePayee()
    {
        $this->edit_id = null;
    }

    public function updatePayee()
    {
        $this->validate();

        Payee::find($this->edit_id)->update([
            'name' => $this->name,
            'amount' => $this->amount ?? null,
            'schedule' => $this->schedule ?? false,
        ]);

        $this->closePayee();
    }

    public function deletePayee()
    {
        Payee::find($this->edit_id)->delete();

        $this->closePayee();
    }
}
