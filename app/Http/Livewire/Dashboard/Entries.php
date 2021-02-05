<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Dashboard;
use App\Models\Entry;

class Entries extends Dashboard
{
    public $entry_id;
    public $delete;
    public $modal;

    protected $entry;

    protected $listeners = [
        'entries:refresh' => '$refresh',
    ];

    public function render()
    {
        $this->getPayPeriod()->getPayees();

        $entries = $this->pay_period->entries->sortBy(function($entry) {
            return $entry->payee
                ? $entry->payee->name
                : $entry->name;
        });

        return view('dashboard.entries', [
            'entries' => $entries,
            'payees' => $this->payees,
        ]);
    }

    public function openEntry($id)
    {
        $this->getEntry($id);

        $this->entry_id = $id;
        $this->payee_id = $this->entry->payee ? $this->entry->payee->id : null;
        $this->name = $this->entry->name ?? null;
        $this->amount = $this->entry->amount;
        $this->scheduled = $this->entry->scheduled ?? false;
        $this->reconciled = $this->entry->reconciled ?? false;
        $this->delete = false;

        $this->modal = true;

        $this->emit('entry:edit');
    }

    public function closeEntry()
    {
        $this->modal = false;

        $this->entry = null;

        $this->entry_id = null;
        $this->payee_id = null;
        $this->name = null;
        $this->amount = null;
        $this->scheduled = null;
        $this->reconciled = null;
        $this->delete = null;
    }

    public function updateEntry()
    {
        $this->validate();

        $this->getPayPeriod()->getEntry($this->entry_id);

        $this->entry->update([
            'payee_id' => (!empty($this->payee_id)) ? $this->payee_id : null,
            'name' => $this->name ?? null,
            'amount' => $this->amount,
            'scheduled' => $this->scheduled ?? false,
            'reconciled' => $this->reconciled ?? false,
        ]);

        $this->emit('entries:refresh');

        $this->closeEntry();
    }

    public function deleteEntry()
    {
        $this->getPayPeriod()->getEntry($this->entry_id);

        $this->entry->delete();

        $this->emit('entries:refresh');

        $this->closeEntry();
    }

    protected function getEntry($id)
    {
        $this->entry = Entry::where('id', $id)->first();

        return $this;
    }
}
