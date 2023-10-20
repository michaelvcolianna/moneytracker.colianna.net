<?php

namespace App\Livewire;

use App\Models\Entry;
use Closure;
use Illuminate\View\View;
use Livewire\Component;

class SingleEntry extends Component
{
    /** @var \App\Models\Entry */
    public $entry;

    /** @var boolean */
    public $confirmingDelete = false;

    /**
     * Validation rules for making a new entry.
     */
    protected $rules = [
        'entry.payee' => 'required',
        'entry.amount' => 'required|integer',
        'entry.scheduled' => 'nullable|boolean',
        'entry.reconciled' => 'nullable|boolean',
    ];

    /**
     * Validation attribute names.
     */
    protected $validationAttributes = [
        'entry.payee' => 'payee',
        'entry.amount' => 'entry amount',
        'entry.scheduled' => 'scheduled option',
        'entry.reconciled' => 'reconciled option',
    ];

    /**
     * Events the component listens for.
     */
    protected $listeners = ['escapeKeyPressed'];

    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('entries.single');
    }

    /**
     * Act on an updated value.
     */
    public function updated()
    {
        $this->validate();

        $this->entry->save();

        $this->cleanup();
    }

    /**
     * Delete an entry.
     */
    public function deleteEntry()
    {
        $this->entry->delete();

        $this->cleanup();
    }

    /**
     * Handle changes to the entry.
     */
    public function cleanup()
    {
        session('payday')->refresh();
        session('payday')->recalculate();

        $this->dispatch('paydayUpdated');
    }

    /**
     * Handle escape key.
     */
    public function escapeKeyPressed()
    {
        $this->confirmingDelete = false;
    }
}
