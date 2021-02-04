<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Dashboard;
use App\Models\Entry;

class AddEntry extends Dashboard
{
    public $modal;

    public function render()
    {
        $this->getPayPeriod()->getPayees();

        return view('dashboard.add-entry', [
            'date' => $this->pay_period->date->format('n/j/Y'),
            'payees' => $this->payees,
        ]);
    }

    public function openModal()
    {
        $this->modal = true;

        $this->emit('entry:new');
    }

    public function addEntry()
    {
        $this->validate();

        $this->getPayPeriod();

        Entry::create([
            'pay_period_id' => $this->pay_period->id,
            'payee_id' => (!empty($this->payee_id)) ? $this->payee_id : null,
            'name' => $this->name ?? null,
            'amount' => $this->amount,
            'scheduled' => $this->scheduled ?? false,
            'reconciled' => $this->reconciled ?? false,
        ]);

        $this->clearModal();

        $this->emit('entries:refresh');
    }

    public function clearModal()
    {
        $this->modal = false;

        $this->payee_id = null;
        $this->name = null;
        $this->amount = null;
        $this->scheduled = null;
        $this->reconciled = null;
    }
}
