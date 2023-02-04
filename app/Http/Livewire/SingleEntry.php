<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SingleEntry extends Component
{
    /** @var \App\Models\Entry */
    public $entry;

    /** @var boolean */
    public $confirmingDelete;

    /**
     * Validation rules for making a new entry.
     *
     * @var array
     */
    protected $rules = [
        'entry.payee' => 'required',
        'entry.amount' => 'required|integer',
        'entry.scheduled' => 'nullable|boolean',
        'entry.reconciled' => 'nullable|boolean',
    ];

    /**
     * Validation attribute names.
     *
     * @var array
     */
    protected $validationAttributes = [
        'entry.payee' => 'payee',
        'entry.amount' => 'entry amount',
        'entry.scheduled' => 'scheduled option',
        'entry.reconciled' => 'reconciled option',
    ];

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Entry  $entry
     * @return void
     */
    public function mount($entry)
    {
        $this->entry = $entry;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('entries.single');
    }

    /**
     * Act on an updated value.
     *
     * @return void
     */
    public function updated()
    {
        $this->validate();

        $this->entry->save();

        $this->cleanup();
    }

    /**
     * Delete an entry.
     *
     * @return void
     */
    public function deleteEntry()
    {
        $this->entry->delete();

        $this->cleanup();
    }

    /**
     * Handle changes to the entry.
     *
     * @return void
     */
    public function cleanup()
    {
        session('payday')->refresh();
        session('payday')->recalculate();

        $this->emit('paydayUpdated');
    }
}
