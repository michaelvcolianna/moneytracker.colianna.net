<?php

namespace App\Http\Livewire\Payees;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payee;

class Listing extends Component
{
    use WithPagination;

    public $payee_id;
    public $name;
    public $amount;
    public $notes;
    public $schedule;
    public $delete;
    public $modal;

    protected $payee;

    protected $rules = [
        'name' => 'required|string',
        'amount' => 'nullable|numeric',
        'notes' => 'nullable|string',
        'schedule' => 'nullable|boolean',
    ];

    protected $listeners = [
        'payees:refresh' => '$refresh',
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
        $this->getPayee($id);

        $this->payee_id = $id;
        $this->name = $this->payee->name;
        $this->amount = $this->payee->amount ?? null;
        $this->notes = $this->payee->notes ?? null;
        $this->schedule = $this->payee->schedule ?? false;
        $this->delete = false;

        $this->modal = true;

        $this->emit('payee:edit');
    }

    public function closePayee()
    {
        $this->modal = false;

        $this->payee = null;

        $this->name = null;
        $this->amount = null;
        $this->notes = null;
        $this->schedule = null;
        $this->delete = null;
    }

    public function updatePayee()
    {
        $this->validate();

        $this->getPayee($this->payee_id);

        $this->payee->update([
            'name' => $this->name,
            'amount' => (!empty($this->amount)) ? $this->amount : null,
            'notes' => (!empty($this->notes)) ? $this->notes : null,
            'schedule' => $this->schedule ?? false,
        ]);

        $this->emit('payees:refresh');

        $this->closePayee();
    }

    public function deletePayee()
    {
        $this->getPayee($this->payee_id);

        $this->payee->delete();

        $this->emit('payees:refresh');

        $this->closePayee();
    }

    protected function getPayee($id)
    {
        $this->payee = Payee::where('id', $id)->first();

        return $this;
    }
}
